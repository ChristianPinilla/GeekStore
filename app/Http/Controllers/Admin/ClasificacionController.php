<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Clasificacion;

class ClasificacionController extends Controller
{
    public function index()
    {
        $clasificaciones = Clasificacion::where('borrado',false)->get();

        return view('admin.clasificacion.index',compact('clasificaciones'));
    }

    public function crear( Request $request )
    {
        if($request->isMethod('POST')){
            $validator = $request->validate(
                [
                    'nombre' => 'required',
                ],
    
                [
                    'nombre.required' => 'Requerido',
                ]
            );
            
            $clasificacion = new Clasificacion();
            $clasificacion->nombre = $request->nombre;
            $clasificacion->save();

            return redirect( route('admin::clasificacion.index') );
        }

        return view('admin.clasificacion.crear');
    }

    public function actualizar( $id )
    {
        $clasificacion = Clasificacion::finOrFail($id);

        if($request->isMethod('POST')){
            $validator = $request->validate(
                [
                    'nombre' => 'required',
                ],
    
                [
                    'nombre.required' => 'Requerido',
                ]
            );

            $clasificacion->nombre = $request->nombre;
            $clasificacion->save();

            return redirect( route('admin.clasificacion.index') );
        }

        return view('admin.clasificacion.actualizar',compact('clasificacion'));
    }

    public function eliminar( $id )
    {
        $clasificacion = Clasificacion::finOrFail($id);
        $clasificacion->borrado = true;
        $clasificacion->save();

        return redirect( route('admin.clasificacion.index') );
    }
}
