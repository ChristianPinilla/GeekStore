@extends('layouts.admin')

@section('body')

    <div clas="container-fluid">
        <div class="row mr-2 ml-2">

            <div class="col-lg-9">
                <h1 class="font-weight-bold mb-0" >Productos</h1>
                <p class="lead text-muted" > Revisa la lista </p>
            </div>

            <div class="col-lg-3 d-flex">
                <button class="btn btn-primary w-100 align-self-center"> <a href="{{route('admin::producto.crear')}}"> Agregar </a> </button>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 15%;">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio Unidad</th>
                <th scope="col">Cantidad Vendida</th>
                <th scope="col">Stock Actual</th>
                <th scope="col">Stock Crítico</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php  $cont = 0 ?>
            @foreach ( $productos as $producto )
                <?php $cont ++ ?>
                <tr>
                    <th score="row"> {{$cont}} </th>
                    <td> 
                        @if($producto->imagen != '')
                            <img src="{{Storage::url($producto->imagen)}}" class="card-img img-fluid rounded" 
                            style="object-fit: contain; height: 5rem;">
                        @else
                            No se ha agregado Imagen
                        @endif
                    </td>
                    <td> {{$producto->nombre}} </td>
                    <td> {{$producto->descripcion}} </td>
                    <td> {{$producto->precio_unidad}} </td>
                    <td> {{$producto->cantidad_vendida}} </td>
                    <td> {{$producto->stock_actual}} </td>
                    <td> {{$producto->stock_critico}} </td>
                    <td> 
                        <a href="{{route('admin::producto.actualizar',[$producto->id])}}"> <i class="far fa-eye"></i> </a>
                        <a href="{{route('admin::producto.eliminar',[$producto->id])}}"> <i class="far fa-trash-alt"></i> </a>
                    </td>

                </tr>    
            @endforeach
            
            </tbody>
        </table>
    </div>

@endsection



@section('js')

@endsection