@extends('layouts.publico')

@section('body')
    {{-- <div class="titulo-form">
        <h2> Registrarse </h2>
        <p> ¿Ya tienes cuenta? <a href="{{route('publico::iniciar-sesion')}}"> Inicia Sesión </a> </p>
    </div>
    <div class="form-register">
        <form class="form" action="{{route('publico::register')}}">
                <input type="text" id="nombres" placeholder="Escriba sus nombres...">
                <input type="text" id="primer_apellido" placeholder="Escriba su Primer Apellido">
                <input type="text" id="segundo_apellido" placeholder="Escriba su Segundo Apellido">
                <input type="text" id="telefono" placeholder="Ej: +56999697121">
                <input type="text" id="direccion" placeholder="Ej: Barros Luco 1485, San Antonio, Valparaíso">
                <input type="email" id="email" placeholder="Ej: chirismo123@gmail.com">
                <input type="password" id="password" placeholder="Escriba su contraseña">
                
                
                <input type="submit" class="button" value="Registrarse">
        </form>
    </div> --}}

    <div class="sesion-register">
        <div class="sesion__imagen"></div>
        <div class="sesion__titulo"> Regístrate </div>
        <div class="sesion__subtitulo"> Sé parte de nuestra comunidad </div>

        <form method="POST" action="{{route('publico::register')}}">
            @csrf
            <div class="sesion__campos">
                <div class="sesion__div"><input type="text" id="nombres" name="nombres" placeholder="Escriba sus nombres" class="sesion__div-input"/></div>
                <div class="sesion__div-mitad"><input type="text" id="primer_apellido" name="primer_apellido" placeholder="Escriba su Primer Apellido" class="sesion__div-input"/></div>
                <div class="sesion__div-mitad"><input type="text" id="segundo_apellido" name="segundo_apellido" placeholder="Escriba su Segundo Apellido" class="sesion__div-input"/></div>
                <div class="sesion__div"><input type="text" id="telefono" name="telefono" placeholder="Ej: +56999697121" class="sesion__div-input"/></div>
                <div class="sesion__div"><input type="text" id="direccion" name="direccion" placeholder="Ej: Barros Luco 1485, San Antonio, Valparaíso" class="sesion__div-input"/></div>
                <div class="sesion__div"><input type="email" id="email" name="email" placeholder="Ej: chirismo123@gmail.com" class="sesion__div-input"/></div>
                <div class="sesion__div"><input type="password" id="password" name="password" placeholder="Escriba su contraseña" class="sesion__div-input"/></div>
              </div>
      
              <button class="sesion__boton" type="submit"> Registrarse </button>
              <div class="sesion__link">
                <a href="#">¿Ya tienes cuenta? </a> <a href="{{route('publico::iniciar-sesion')}}"> Inicia Sesión </a>
              </div>
        </form>
    </div>

@endsection