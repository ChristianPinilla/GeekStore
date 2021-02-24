<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardUsuarioController extends Controller
{
    public function index()
    {
        return view( 'usuario.index' );
    }
}
