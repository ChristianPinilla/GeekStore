@extends('layouts.publico')

@section('body')

    {{-- Transicion de imagenes de estreno --}}
    <div class="estreno">
        <div class="estreno__contenedor">
            <button aria-label="Anterior" class="estreno__anterior"> 
                <i class="fas fa-chevron-left"></i> 
            </button>

            <div class="estreno__lista">
                @foreach ( $ultimosProductos as $producto )
                    <div class="estreno__elemento">
                        @if($producto->imagen_estreno != '')
                        <img src="{{Storage::url($producto->imagen_estreno)}}">
                        @elseif($producto->imagen != '')
                            <img src="{{Storage::url($producto->imagen)}}">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                        @endif
                        <p class="estreno__nombre">{{$producto->nombre}}</p>
                    </div>  
                @endforeach
            </div>

            <button aria-label="Siguiente" class="estreno__siguiente"> 
                <i class="fas fa-chevron-right"></i> 
            </button>

        </div>

        <div role="tablist" class="estreno__indicadores" id="estreno__indicadores"></div>
    </div>


    {{-- Categorias y productos --}}

    <?php $variable = ''?>
    @foreach ($clasificaciones as $clasificacion)
        <?php $variable .= (string) $clasificacion->id?>
    @endforeach

    <div class="carousel" id="carousel" data-categorias="{{$variable}}">
        @foreach ($clasificaciones as $clasificacion)
            <div class="carousel__contenedor">
                <h2 class="carousel__categoria"> {{$clasificacion->nombre}}</h2>
                <button aria-label="Anterior" class="carousel__anterior" id="carousel__anterior{{$clasificacion->id}}"> 
                    <i class="fas fa-chevron-left"></i> 
                </button>

                <div class="carousel__lista" id="carousel__lista{{$clasificacion->id}}">
                    @foreach ( $productos as $producto )
                        @if ( $producto->clasificacion_id == $clasificacion->id )
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
                        @endif
                    @endforeach
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente" id="carousel__siguiente{{$clasificacion->id}}"> 
                    <i class="fas fa-chevron-right"></i> 
                </button>

            </div>

            <div role="tablist" class="carousel__indicadores" id="carousel__indicadores{{$clasificacion->id}}"></div>
        @endforeach
    </div>



@endsection

@section('js')
    <script>
        window.addEventListener('load',function(){
            //Carousel Estrenos
            new Glider(document.querySelector('.estreno__lista'), {
                slidesToShow: 1,
                dots: '.estreno__indicadores',
                arrows: {
                    prev: '.estreno__anterior',
                    next: '.estreno__siguiente'
                },
            });


            //Carousel Categorias
            let categorias = document.getElementById('carousel').getAttribute('data-categorias');
            for (i in categorias) {
                new Glider(document.querySelector('#carousel__lista'+categorias[i]), {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: '#carousel__indicadores'+categorias[i],
                arrows: {
                    prev: '#carousel__anterior'+categorias[i],
                    next: '#carousel__siguiente'+categorias[i]
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
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        }
                    }
                    ]
            });
            }
            
        });

        let contador = 0; 
        setInterval(function(){
            contador +=4;
            if(contador <= 12){
                document.querySelector('.estreno__siguiente').click();
            }
            else{
                document.querySelector('.estreno__anterior').click();
                document.querySelector('.estreno__anterior').click();
                document.querySelector('.estreno__anterior').click();
                contador = 0;
            }
        }, 4000);

    </script>
@endsection
