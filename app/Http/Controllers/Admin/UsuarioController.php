<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('admin.usuario.index',compact('usuarios'));
    }

    public function crear( Request $request )
    {
        if($request->isMethod('POST')){
            $validacion = $request->validarRegistro();
            
            $clasificacion = Clasificacion::create( $request->all() );
            $clasificacion->save();

            return redirect( route('admin::clasificacion.index') );
        }

        return view('admin::clasificacion.crear');
    }

    public function actualizar( $id )
    {
        $clasificacion = Clasificacion::finOrFail($id);

        if($request->isMethod('POST')){
            $validacion = $request->validarRegistro();

            $clasificacion->nombre = $request->nombre;
            $clasificacion->save();

            return redirect( route('admin::clasificacion.index') );
        }

        return view('admin::clasificacion.actualizar','clasificacion');
    }
}
