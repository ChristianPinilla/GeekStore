<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('../../assetsCreadas/css/stylePublicoHeader.css') }}" type="text/css" rel="stylesheet" >
    <link href="{{ asset('../../assetsCreadas/css/stylePublicoBody.css') }}" type="text/css" rel="stylesheet" >

    {{-- Fuentes de google --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@1,300&family=Noto+Sans+SC:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@1,300&family=Noto+Sans+SC:wght@300&family=Rancho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">

    <title>GeekStore</title>
</head>
<body>
    <header class="header">
        {{-- Nav Bar --}}
        <div class="logo">
            <a href="{{route('publico::index')}}"> <img src="{{URL::asset('/assetsCreadas/img/imagenFinal.png')}}" alt=""> </a> 
            <span class="menu-icono" id="menu-icono"> <i class="fas fa-grip-lines"></i> Ver menú </span> 
        </div>
        <nav class="nav">
            <ul class="lista">
                <li> 
                    <a  href="{{route('publico::index')}}"> INICIO </a>
                </li>

                <li class="nav-coleccion" >
                    <span> COLECCIÓN <i class="fas fa-caret-down"></i> </span>
                    <ul>
                        @foreach ( $clasificaciones as $clasificacion)
                            <li> <a href=""> {{$clasificacion->nombre}}</a> </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-nosotros"> 
                    <a  href="{{route('publico::quienes-somos')}}"> NOSOTROS </a>
                </li>

                <li class="nav-carrito">
                    <a href="{{route('publico::producto.carrito')}}"> <i class="fas fa-shopping-cart"></i>  </a>
                </li>

                <li class="nav-buscador">
                    <form action="{{route('publico::buscador')}}" method="POST">
                        @csrf
                        {{-- <input name="nombre" id="nombre" type="text" placeholder=" Busca un Producto... "> --}}
                        <button type="submit"> <i class="fas fa-search"></i> </button>
                    </form>
                </li>

                <li class="nav-sesion">
                    @auth
                        <button><a href="">  <i class="far fa-user"></i> {{Auth::user()->nombres}} </a> </button>
                    @endauth
        
                    @guest
                        <button><a href="{{route('publico::iniciar-sesion')}}"> <i class="far fa-user"></i></a> </button>
                    @endguest
                </li>

            </ul>
        </nav>

    </header>

    <div class="contenido-principal">

        @yield('body')
    
    </div>
    @include('sweetalert::alert')

    
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
        crossorigin="anonymous">
    </script>
    <script src="../../assetsCreadas/js/publico.js" ></script>
    <script src="../../assetsCreadas/js/sweetAlert.js" ></script>
    @yield('js')

</body>
</html>