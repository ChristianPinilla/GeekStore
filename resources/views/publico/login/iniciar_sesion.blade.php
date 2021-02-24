@extends('layouts.publico')

@section('body')

    <div class="sesion">
        <div class="sesion__imagen"></div>
        <div class="sesion__titulo">Conéctate a tu cuenta</div>
        <div class="sesion__subtitulo"> Navega por el sitio conectado </div>

        <form method="POST" action="{{route('publico::iniciar-sesion')}}">
          @csrf
          <div class="sesion__campos">
            <div class="sesion__div"><input type="email" id="email" name="email" class="sesion__div-input" placeholder="correo" /></div>
            <div class="sesion__div"><input type="password" id="password" name="password" class="sesion__div-input" placeholder="contraseña" /></div>
          </div>
  
          <button type="submit" class="sesion__boton"> Iniciar Sesión </button>
        </form>
        <div class="sesion__link">
          <a href="#">¿Olvidaste tu contraseña? </a> <a href="{{route('publico::register')}}">  Regístrate</a>
        </div>
    </div>

@endsection