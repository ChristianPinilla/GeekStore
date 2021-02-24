@extends('layouts.publico')

@section('body')

    <div class="detalle">

        <div class="contenedor">
            <div class="imagen">
                <img src="{{Storage::url($producto->imagen)}}" alt="">
            </div>
        
            <div class="cuerpo">
        
                <h2> {{$producto->nombre}} </h2>

                <div class="descripcion">
                    <p> {{$producto->descripcion}} </p>
                </div>
        
                <div class="acciones">
                    <h6> $ {{number_format($producto->precio_unidad, 0, ',', '.')}} </h6>
                    <span> {{$producto->stock_actual}} disponible(s) </span>
                    <a href="{{route('publico::producto.agregar-al-carrito',[$producto->id])}}" class="detalle__carrito"> 
                        <button class="detalle__boton"> Añadir al Carrito <i class="fas fa-cart-plus"></i> </button> 
                    </a>
                </div>
    
                <div class="redes">
                    <a href=""> <span> <i class="fab fa-facebook"></i> </span> </a>
                    <a href=""> <span> <i class="fab fa-instagram"></i> </span> </a>
                    <a href=""> <span> <i class="fab fa-twitter"></i> </span> </a>
                </div>
        
            </div>
        </div>

        <div class="relacionados">
            <h3> Productos Relacionados <a href=""> <button> <i class="fas fa-plus"></i> Ver todos </button> </a></h3>
            <?php $maximo = 0?>
            @foreach ( $relacionados as $relacionado )
                @if ($maximo<3)
                    <?php $maximo ++?> 
                    <div class="elemento">
                        <a href="{{route('publico::producto.detalle',[$relacionado->id])}}">
                            <div class="imagen-relacionado">
                                @if($relacionado->imagen != '')
                                    <img src="{{Storage::url($relacionado->imagen)}}">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                    preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c"/>
                                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                    </svg>
                                @endif
                            </div>
                            <div class="cuerpo-relacionado">
                                <p>${{number_format($relacionado->precio_unidad, 0, ',', '.')}}</p>
                            </div>
                        </a>
                    </div> 
                @endif
            @endforeach
        </div>
        
    </div>
    

@endsection