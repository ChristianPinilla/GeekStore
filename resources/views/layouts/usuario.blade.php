<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assetsCreadas/css/styleAdmin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">

    <title> GeekStore </title>
  </head>
  <body>

    <div class="d-flex">
        {{-- Lateral del dashboard de admin --}}
        <div class="bg-primary" id="sidebar-container">

            <div class="logo">
                <h4 class="text-light font-weight-bold "> GeekStore </h4>
            </div>

            <div class="menu">
                <a href="{{route('usuario::index')}}" class="d-block text-light p-3"> <i class="fas fa-info-circle mr-2 lead"></i> Información General </a>
                <a href="{{route('usuario::compra.index')}}" class="d-block text-light p-3"> <i class="fas fa-shopping-cart mr-2 lead"></i> Compras </a>
                <a href="{{route('usuario::configuracion.inicio-sesion')}}" class="d-block text-light p-3"> <i class="fas fa-user-cog mr-2 lead"></i> Configuración </a>
            </div>

        </div>

        {{-- Contenido --}}
        <div class="w-100">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <form class="form-inline position-relative my-2 d-inline-block">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-search position-absolute" type="submit"> <i class="fas fa-search"></i> </button>
                  </form>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->nombres}}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('publico::index')}}">Ir a la tienda</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('publico::cerrar-sesion')}}">Cerrar Sesión</a>
                      </div>
                    </li>
                  </ul>
                </div>
            </nav>

            <div id="content">
                <section class="py-3">
                    @yield('body')
                </section>
            </div>
            
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" 
    crossorigin="anonymous"></script>
    {{-- <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
              labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
              datasets: [{
                  label: 'Nuevos Usuarios',
                  backgroundColor: [
                      '#12C9E5',
                      '#12C9E5',
                      '#111b54'
                  ],
                  maxBarThickness: 30,

                  borderColor: 'rgb(255, 99, 132)',
                  data: [50, 100, 150, 200]
              }]
          },

          // Configuration options go here
          options: {}
      });
    </script>  --}}
</body>
</html>