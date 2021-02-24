<?php

namespace App\Http\Controllers\Publico;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Clasificacion;

class PublicoController extends Controller
{
    public function index()
    {
        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();

        $productos = Producto::where('borrado',false)->get();

        $ultimosProductos = Producto::latest()->take(4)->get();

        return view('publico.index', compact('productos','ultimosProductos','clasificaciones'));
    }

    public function buscar(Request $request)
    {
        $productos = Producto::where('nombre','LIKE','%'.$request->nombre.'%')->get();

        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();

        return view('publico.buscador',compact('productos','clasificaciones'));
    }

    public function quienesSomos()
    {
        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();
        return view('publico.quienesSomos',compact('clasificaciones'));
    }

    public function registrarUsuario(Request $request)
    {
        if( $request->isMethod('POST') ){
            $validacion = $request->validate([
                    'nombres' => 'required',
                    'primer_apellido' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ],
    
                [
                    'nombres.required' => 'Requerido',
                    'primer_apellido.required' => 'Requerido',
                    'email.required' => 'Requerido',
                    'password.required' => 'Requerido',
                ]
            );
            $usuario = new Usuario();
            $usuario->nombres = $request->nombres;
            $usuario->primer_apellido = $request->primer_apellido;
            $usuario->segundo_apellido = $request->segundo_apellido;
            $usuario->telefono = $request->telefono;
            $usuario->direccion = $request->direccion;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->save();
        
            alert()->success('Registrado!', 'El registro de la cuenta ha sido un éxito.');
            return redirect()->route('publico::index') ;
        }

        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();

        return view('publico.login.registrarse',compact('clasificaciones'));
    }

    public function iniciarSesion( Request $request )
    {
        if($request->isMethod('POST')){
            
            $validacion = $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                ],
    
                [
                    'email.required' => 'Requerido',
                    'password.required' => 'Requerido',
                ]
            );
            $credenciales = $request->only('email','password');

            if( !Auth::attempt($credenciales) ){

                alert()->error('Problema al iniciar sesión', 'El correo o la contraseña son incorrectos, vuelve a intentarlo.');
                return redirect()->back();
            }
        
            alert()->success('Conectado!', 'El inicio de sesión ha sido un éxito.');
            if( Auth::user()->admin ){
                return redirect()->route('admin::index');  
            }
            return redirect()->route('usuario::index');
        }

        $clasificaciones = Clasificacion::whereHas('productos',function($q){
            $q->where('productos.borrado',false);
        })->get();

        return view('publico.login.iniciar_sesion',compact('clasificaciones'));
    }

    public function cerrarSesion()
    {
        Auth::logout();

        alert()->success('Desconectado!', 'La sesión se ha cerrado correctamente.');
        return redirect()->route('publico::index');
    }
}
