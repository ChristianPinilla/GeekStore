@extends('layouts.admin')

@section('body')

    <div clas="container-fluid">
        <div class="row mr-2 ml-2">

            <div class="col-lg-9">
                <h1 class="font-weight-bold mb-0" >Compras</h1>
                <p class="lead text-muted" > Revisa la lista </p>
            </div>

            <div class="col-lg-3 d-flex">
                <button class="btn btn-primary w-100 align-self-center"> <a href=""> Agregar </a> </button>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th score="col">Usuario</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha</th>
                <th scope="col"> Detalle </th>
            </tr>
            </thead>
            <tbody>
            <?php  $cont = 0 ?>
            @foreach ( $compras as $compra )
                <?php $cont ++ ?>
                <tr>
                    <th scope="row"> {{$cont}} </th>
                    <td> {{$compra->usuarios}} {{$compra->usuarios->email}} </td>
                    <td> {{$compra->monto}} </td>
                    <td> fecha </td>
                    <th> detalle </th>
                </tr>    
            @endforeach
            
            </tbody>
        </table>
    </div>

@endsection



@section('js')

@endsection