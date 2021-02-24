<?php

namespace App\Http\Controllers\Publico;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\ProductoCompra;
use App\Models\Usuario;
use App\Models\Clasificacion;

class ProductoController extends Controller
{
    public function verDetalle( $id )
    {
        $producto = Producto::findOrFail($id);
        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();
        $relacionados = Producto::where(
            [
                ['clasificacion_id', $producto->clasificacion_id],
                ['id','<>',$producto->id]
            ]
        )->get();

        return view('publico.producto.detalle',compact('producto','clasificaciones','relacionados'));
    }

    public function verCarrito()
    {
        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();

        $productos = Producto::where('borrado',false)->get();

        return view('publico.producto.carrito',compact('clasificaciones','productos'));
    }

    public function agregarAlCarrito( $id )
    {
        $producto = Producto::find($id);

        $carrito = session()->get('carrito');

        if ( !$carrito ) {
            $carrito = [$id => [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'imagen' => $producto->imagen,
                'precio' => $producto->precio_unidad,
                'stock_actual' => $producto->stock_actual,
                'cantidad' => 1],];
        } else {
            if ( isset($carrito[$id]) ) {
                $carrito[$id]['cantidad']++;
                $carrito[$id]['stock_actual'] = $producto->stock_actual;
            } else {
                $carrito[$id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'imagen' => $producto->imagen,
                'precio' => $producto->precio_unidad,
                'cantidad_maxima' => $producto->stock_actual,
                'cantidad' => 1];
            }
        }
        session()->put('carrito', $carrito);

        alert()->success('Producto Añadido!', 'Se ha añadido un producto a tu carrito.');
        return redirect()->back();
    }

    public function eliminarDelCarrito( $id )
    {
        $carrito = session()->get('carrito');
        unset($carrito[$id]);
        session()->put('carrito', $carrito);

        alert()->success('Producto Eliminado!', 'Se ha eliminado un producto a tu carrito.');
        return redirect()->back();
    }

    public function limpiarCarrito()
    {
        $carrito = session()->get('carrito');
        foreach ( session('carrito') as $id => $detalles ) {
            unset($carrito[$id]);
        }
        session()->put('carrito', $carrito);

        alert()->success('Carrito Limpio!', 'Se ha limpiado el carrito correctamente.');
        return redirect()->route('publico::index');
    }

    public function compra()
    {
        
    }

    public function confirmarCompra()
    {
        $usuario = Usuario::findOrFail( Auth()->user()->id );

        $compra = new Compra();
        $compra->usuario_id = $usuario->id;

        $monto = 0;

        $carrito = session()->get('carrito');
        foreach ( session('carrito') as $id => $detalles ) {
            $monto += $carrito[$id]['precio'] * $carrito[$id]['cantidad'];

            //Descontar, del stock, el producto vendido
            $producto = Producto::findOrFail( $carrito[$id]['id'] );
            $producto->stock_actual -= $carrito[$id]['cantidad'];

            //Agregar a productos_compras cada producto vendido
            $productoCompra = ProductoCompra::create([
                'producto_id' => $producto->id,
                'compra_id' => $compra->id,
                'cantidad_vendida' => $carrito[$id]['cantidad'],
                'monto_cantidad_vendida' => $carrito[$id]['precio'] * $carrito[$id]['cantidad']
            ]);

            $producto->save(); 
            $productoCompra->save();

            unset($carrito[$id]);
        }

        $compra->monto = $monto;
        $usuario->monto_total_comprado += $monto; 

        $compra->save();
        $usuario->save();

        session()->put('carrito', $carrito);

        alert()->success('Compra Registrada!', 'Se ha registrada tu compra correctamente.');
        return redirect()->route('publico::index');
    }
}
