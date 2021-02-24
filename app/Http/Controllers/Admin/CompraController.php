<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Compra;
use App\Models\ProductoCompra;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();

        return view('admin.compra.index',compact('compras'));
    }

    public function detalle( $id )
    {
        $productosCompra = ProductoCompra::where('compra_id',$id)->get();

        return view('admin.compra.detalle',compract('productosCompra'));
    }
}
