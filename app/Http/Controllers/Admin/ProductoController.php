<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Producto;
use App\Models\Clasificacion;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::where('borrado',false)->get();
        
        return view('admin.producto.index',compact('productos'));
    }

    public function crear( Request $request )
    {
        if($request->isMethod('POST')){

            $validator = $request->validate([
                    'nombre' => 'required',
                    'precio_unidad' => 'required',
                    'proveedor_id' => 'required',
                    'clasificacion_id' => 'required',
                    'stock_actual' => 'required',
                    'stock_critico' => 'required',
                    'descripcion' => 'required',
                ],
    
                [
                    'nombre.required' => 'Requerido',
                    'precio_unidad.required' => 'Requerido',
                    'proveedor_id.required' => 'Requerido',
                    'clasificacion_id.required' => 'Requerido',
                    'stock_actual.required' => 'Requerido',
                    'stock_critico.required' => 'Requerido',
                    'descripcion.required' => 'Requerido'
                ]
            );

            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->precio_unidad = $request->precio_unidad;
            $producto->stock_actual = $request->stock_actual;
            $producto->stock_critico = $request->stock_critico;
            $producto->proveedor_id = $request->proveedor_id;
            $producto->clasificacion_id = $request->clasificacion_id;
            $producto->descripcion = $request->descripcion;

            if(isset($request->imagen)){
                $producto->imagen = $request->imagen->store('public/productos');
            }
            if(isset($request->imagen_estreno)){
                $producto->imagen_estreno = $request->imagen_estreno->store('public/productos');
            }

            $producto->save();

            alert()->success('Producto añadido!', 'Se ha añadido un nuevo producto al inventario.');
            return redirect()-> route('admin::producto.index');
        }

        $clasificaciones = Clasificacion::where('borrado',false)->get();
        $proveedores = Proveedor::where('borrado',false)->get();

        return view('admin.producto.crear',compact('clasificaciones','proveedores'));
    }

    public function actualizar(Request $request, $id )
    {
        $producto = Producto::findOrFail($id);

        if($request->isMethod('POST')){

            $validator = $request->validate(
                [
                    'nombre' => 'required',
                    'precio_unidad' => 'required',
                    'proveedor_id' => 'required',
                    'clasificacion_id' => 'required',
                    'stock_actual' => 'required',
                    'stock_critico' => 'required',
                ],
    
                [
                    'nombre.required' => 'Requerido',
                    'precio_unidad.required' => 'Requerido',
                    'proveedor_id.required' => 'Requerido',
                    'clasificacion_id.required' => 'Requerido',
                    'stock_actual.required' => 'Requerido',
                    'stock_critico.required' => 'Requerido',
                ]
            );

            $producto->nombre = $request->nombre;
            $producto->precio_unidad = $request->precio_unidad;
            $producto->stock_actual = $request->stock_actual;
            $producto->stock_critico = $request->stock_critico;
            $producto->proveedor_id = $request->proveedor_id;
            $producto->clasificacion_id = $request->clasificacion_id;

            if(isset($request->imagen)){
                $producto->imagen = $request->imagen->store('public/productos');
            }
            if(isset($request->imagen_estreno)){
                $producto->imagen_estreno = $request->imagen_estreno->store('public/productos');
            }

            $producto->save();

            alert()->success('Producto actualizado!', 'El producto se ha actualizado correctamente.');
            return redirect( route('admin::producto.index') );
        }

        $clasificaciones = Clasificacion::where('borrado',false)->get();
        $proveedores = Proveedor::where('borrado',false)->get();

        return view('admin.producto.editar',compact('producto','clasificaciones','proveedores'));
    }

    public function eliminar( $id )
    {
        $producto = Producto::finOrFail($id);
        $producto->borrado = true;
        $producto->save();

        alert()->success('Producto eliminado!', 'El producto ha sido eliminado correctamente.');
        return redirect( route('admin::producto.index') );
    }

}
