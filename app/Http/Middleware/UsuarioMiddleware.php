<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ( Auth::check() && !Auth::user()->admin ){
            return $next($request);
        }

        alert()->info('Ups!', 'Parece que no tienes los permisos necesarios para acceder a esta página.');
        return redirect()->route('publico::index');
    }
}
