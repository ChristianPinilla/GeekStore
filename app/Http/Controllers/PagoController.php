<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;

class PagoController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalconfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalconfig['client_id'],     // ClientID
                $payPalconfig['secret']     // ClientSecret
            )
        );
    }

    public function pagarConPaypal()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        //$transaction->setDescription('See your IQ results');

        $callBackUrl = url(route('publico::producto.estado-paypal'));
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callBackUrl)
            ->setCancelUrl($callBackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            // echo $payment;
        
            return redirect()->away( $payment->getApprovalLink() );
        }
        catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function estadoPaypal(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if( !$paymentId || !$payerId || !$token ){
            $estado = 'No se pudo proceder con el pago a través de Paypal';
            return redirect()->route('publico::producto.fallo-paypal')->with( compact('estado') );
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $result = $payment->execute($execution, $this->apiContext);
        // dd($result);
        if ($result->getState() === 'approved') {
            $estado = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect()->route('publico::producto.confirmar-compra')->with(compact('estado'));
        }

        $estado = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect()->route('publico::index',compact('estado'));
    }
}
