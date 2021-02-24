<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::where('borrado',false)->get();
        
        return view('admin.proveedor.index',compact('proveedores'));
    }

    public function crear( Request $request )
    {
        if($request->isMethod('POST')){
            $validator = $request->validate(
                [
                    'nombre' => 'required',
                    'direccion' => 'required'
                ],
    
                [
                    'nombre.required' => 'Requerido',
                    'direccion.required' => 'Requerido'
                ]
            );


            $proveedor = new Proveedor();
            $proveedor->nombre = $request->nombre;
            $proveedor->direccion = $request->direccion;
            $proveedor->save();

            return redirect( route('admin::proveedor.index') );
        }

        return view('admin.proveedor.crear');
    }

    public function actualizar( $id )
    {
        $proveedor = Proveedor::finOrFail($id);

        if($request->isMethod('POST')){
            $validator = $request->validate(
                [
                    'nombre' => 'required',
                    'direccion' => 'required'
                ],
    
                [
                    'nombre.required' => 'Requerido',
                    'direccion.required' => 'Requerido'
                ]
            );

            $proveedor = new Proveedor();
            $proveedor->nombre = $request->nombre;
            $proveedor->direccion = $request->direccion;
            $proveedor->save();

            return redirect( route('admin::proveedor.index') );
        }

        return view('admin.proveedor.actualizar',compact('proveedor'));
    }

    public function eliminar( $id )
    {
        $proveedor = Proveedor::finOrFail($id);
        $proveedor->borrado = true;
        $proveedor->save();

        return redirect( route('admin.proveedor.index') );
    }

}
