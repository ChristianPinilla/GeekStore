@extends('layouts.publico')

@section('body')
    @if (session('carrito'))
        <div class="pagina-carrito">
            <div class="carrito__titulo"> Carrito de Compras <i class="fas fa-shopping-cart"></i> </div>
            <table class="carrito">
            
                <thead class="carrito__encabezado">
                    <tr class="carrito__encabezado-fila">
                        <th class="carrito__encabezado-imagen carrito__encabezado-columna"> Imagen </th>
                        <th class="carrito__encabezado-nombre carrito__encabezado-columna"> Nombre </th>
                        <th class="carrito__encabezado-precio carrito__encabezado-columna"> Precio Unidad </th>
                        <th class="carrito__encabezado-cantidad carrito__encabezado-columna"> Cantidad </th>
                        <th class="carrito__encabezado-sub carrito__encabezado-columna"> Sub-total </th>
                    </tr>

                </thead>

                <tbody class="carrito__cuerpo">

                    <?php $total = 0 ?>
                    @foreach (session('carrito') as $id => $detalles)
                        <?php $total += $detalles['precio'] * $detalles['cantidad']?>
                        <?php $subtotal = $detalles['precio'] * $detalles['cantidad']?>
                        <tr class="carrito__cuerpo-fila">
                            <td class="carrito__cuerpo-imagen carrito__cuerpo-columna">
                                @foreach($productos as $producto)
                                    @if($producto->id == $detalles['id'])
                                        @if( empty($producto->imagen) )
                                            <svg class="card-img img-fluid rounded" width="50px;" height="50px;" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                        @else
                                            <img src="{{Storage::url($producto->imagen)}}" >
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td class="carrito__cuerpo-nombre carrito__cuerpo-columna"> {{$detalles['nombre']}} </td>
                            <td class="carrito__cuerpo-precio carrito__cuerpo-columna"> ${{number_format($detalles['precio'], 0, ',', '.')}}</td>
                            <td class="carrito__cuerpo-cantidad carrito__cuerpo-columna"> {{$detalles['cantidad']}} </td>
                            <td class="carrito__cuerpo-sub carrito__cuerpo-columna"> $ {{number_format($subtotal, 0, ',', '.')}} <a href="{{route('publico::producto.eliminar-del-Carrito',[$detalles['id']])}}"> <i class="fas fa-trash-alt"></i> </a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="compra">
                <h2 class="compra__titulo">Resumen</h2>
                <h6 class="compra__total">Total:  $ {{number_format($total, 0, ',', '.')}} </h6>
                <a href="" class="compra__link"> 
                    <button class="compra__boton"> Confirmar Compra </button> 
                </a>
            </div>
        </div>

    @else
        <div class="carrito__inexistente">

            <h1 class="carrito__inexistente-titulo"> Aún no se han agregado productos al carrito </h1>
            <h3 class="carrito__inexistente-subtitulo"> Agregar algún producto y vuelve </h3>

            <div class="carousel" id="carousel">
                <div class="carousel__contenedor">
                    <h2 class="carousel__categoria"> Todos los Productos</h2>
                    <button aria-label="Anterior" class="carousel__anterior" id="carousel__anterior"> 
                        <i class="fas fa-chevron-left"></i> 
                    </button>
    
                    <div class="carousel__lista" id="carousel__lista">
                        @foreach ( $productos as $producto )
                            <div class="carousel__elemento">
                                <a href="{{route('publico::producto.detalle',[$producto->id])}}">
                                    <div class="carousel__imagen">
                                        <img src="{{Storage::url($producto->imagen)}}">
                                    </div>
                                    <div class="carousel__cuerpo">
                                        <p class="carousel__nombre">{{$producto->nombre}}</p>
                                        <div class="carousel__detalles">
                                            <p class="carousel__precio">$ {{number_format($producto->precio_unidad, 0, ',', '.')}}</p>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>  
                        @endforeach
                    </div>
    
                    <button aria-label="Siguiente" class="carousel__siguiente" id="carousel__siguiente"> 
                        <i class="fas fa-chevron-right"></i> 
                    </button>
    
                </div>
    
                <div role="tablist" class="carousel__indicadores" id="carousel__indicadores"></div>
            </div>
        
        </div>
        
    @endif
@endsection


@section('js')
    <script>
        window.addEventListener('load',function(){
            //Carousel Categorias
            new Glider(document.querySelector('#carousel__lista'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: '#carousel__indicadores',
            arrows: {
                prev: '#carousel__anterior',
                next: '#carousel__siguiente'
            },
            responsive: [
                {
                    breakpoint: 450,
                    settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    }
                },{
                    breakpoint: 1024,
                    settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    }
                }
                ]
            });
        });
    </script>
@endsection
