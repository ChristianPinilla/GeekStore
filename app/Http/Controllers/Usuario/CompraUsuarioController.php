<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraUsuarioController extends Controller
{
    public function index()
    {
        $compras = Compra::where('usuario_id',Auth::user()->id);

        return view('usuario.compra.index',compact('compras'));
    }

    public function detalle( $id )
    {
        $productosCompra = ProductoCompra::where('compra_id',$id)->get();

        return view('usuario.compra.detalle',compract('productosCompra'));
    }
}
