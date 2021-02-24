@extends('layouts.publico')

@section('body')

    <div class="resultados">
        <div class="sidebar-resultados">
            <h2 class="sidebar-resultados__titulo"> Filtros </h2>
            <ul class="sidebar-resultados__items">
                <li class="sidebar-resultados__coleccion">  Colleción <i class="fas fa-sort-down"></i> 
                    <ul class="sidebar-resultados__categorias" id="sidebar-resultados__categorias">
                        @foreach ( $clasificaciones as $clasificacion)
                            <li> <a href=""> {{$clasificacion->nombre}} </a> </li>
                        @endforeach
                    </ul>
                </li>
    
                <li class="sidebar-resultados__precio"> Precio <i class="fas fa-sort-down"></i> 
                    <ul class="sidebar-resultados__precios" id="sidebar-resultados__precios">
                        <li> <a href=""> $10.990 o menos </a> </li>
                        <li> <a href=""> $20.990 o menos </a> </li>
                        <li> <a href=""> $30.990 o menos </a> </li>
                    </ul>
                </li>
    
            </ul>
    
            <div class="sidebar-resultados__datos"> <h6> Encuentra tu producto de una manera más rápida </h6> </div>
        </div>
    
        <div class="productos-resultados">
            <div class="productos-resultados__orden">
                <div class="productos-resultados__div-orden">
                    <label for="orden"> Ordena los productos </label>
                    <select name="orden" id="orden">
                            <option value=""> - Selecciona una opción - </option>
                            <option value="nombre"> Nombre ( A-Z ) </option>
                            <option value="precio"> Precio </option>
                    </select>
                </div>
            </div>
    
            @foreach ( $productos as $producto )
                <div class="productos-resultados__tarjeta">
                    <a href="{{route('publico::producto.detalle',[$producto->id])}}">
                        <div class="productos-resultados__imagen">
                            @if($producto->imagen != '')
                                <img src="{{Storage::url($producto->imagen)}}">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            @endif
                        </div>
                        <div class="productos-resultados__cuerpo">
                            <p class="productos-resultados__nombre-cuerpo">{{$producto->nombre}}</p>
                            <div class="productos-resultados__precio">
                                <p class="productos-resultados__precio-valor">${{number_format($producto->precio_unidad, 0, ',', '.')}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="productos-resultados__orden">
                <div class="productos-resultados__paginas">
                    <p class="productos-resultados__pagina" for=""> Página </p>
                    <div class="productos-resultados__enumeracion">
                        <p> <i class="fas fa-angle-double-left"></i> </p>

                        <p class="productos-resultados__numero"> 1 </p>
                        <p class="productos-resultados__numero"> 2 </p>
                        <p class="productos-resultados__numero"> 3 </p>
                        <p class="productos-resultados__numero"> 4 </p>

                        <p> <i class="fas fa-angle-double-right"></i> </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            var menuColeccionBar = $('.sidebar-resultados__coleccion'),
                listaCategoriasBar = $('.sidebar-resultados__categorias');

            menuColeccionBar.on('click', function(){

                if( listaCategoriasBar.hasClass('show') ){
                    listaCategoriasBar.removeClass('show');
                }else{
                    listaCategoriasBar.addClass('show');
                }

            });

            var menuPrecioBar = $('.sidebar-resultados__precio'),
                listaPreciosBar = $('.sidebar-resultados__precios');

            menuPrecioBar.on('click', function(){

                if( listaPreciosBar.hasClass('show') ){
                    listaPreciosBar.removeClass('show');
                }else{
                    listaPreciosBar.addClass('show');
                }

            });
        });
    </script>
@endsection