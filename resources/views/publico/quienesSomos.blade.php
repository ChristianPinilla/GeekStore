@extends('layouts.publico')

@section('body')

    <div class="quienes-somos">

        <div class="quienes-somos__seccion-uno">
            <img src="{{URL::asset('/assetsCreadas/img/imagenFinal.png')}}" alt="">
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a 
                type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged.It was popularised in the 1960s with the release of Letraset sheets containing 
                Lorem Ipsum passagesand more recently with desktop publishing software like Aldus PageMaker 
                including versions of Lorem Ipsum. 
            </p>
        </div>

        <div class="quienes-somos__seccion-dos">
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a 
                type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged.It was popularised in the 1960s with the release of Letraset sheets containing 
                Lorem Ipsum passagesand more recently with desktop publishing software like Aldus PageMaker 
                including versions of Lorem Ipsum. 
            </p>
            <img src="{{URL::asset('/assetsCreadas/img/imagenFinal.png')}}" alt="">
        </div>

        <div class="quienes-somos__seccion-tres">
            <img src="{{URL::asset('/assetsCreadas/img/ciudad.jpg')}}" alt="">
            <p> San Antonio, Quinta Región</p>
        </div>

    </div>

@endsection

@section('js')
@endsection
