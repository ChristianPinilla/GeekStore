@extends('layouts.admin')

@section('body')

    <div clas="container-fluid">
        <div class="row mr-2 ml-2">

            <div class="col-lg-9">
                <h1 class="font-weight-bold mb-0" >Proveedores</h1>
                <p class="lead text-muted" > Revisa la lista </p>
            </div>

            <div class="col-lg-3 d-flex">
                <button class="btn btn-primary w-100 align-self-center"> <a href="{{route('admin::proveedor.crear')}}"> Agregar </a> </button>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th score="col">Nombre</th>
                <th score="col">Dirección</th>
                <th score="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                
                <?php  $cont = 0 ?>
                @foreach ( $proveedores as $proveedor )
                    <?php $cont ++ ?>
                    <tr>
                        <th scope="row"> {{$cont}} </th>
                        <td> {{$proveedor->nombre}} </td>
                        <td> {{$proveedor->direccion}} </td>
                        <td> 
                            <a href="{{route('admin::proveedor.actualizar',[$proveedor->id])}}"> <i class="far fa-eye"></i> </a>
                            <a href="{{route('admin::proveedor.eliminar',[$proveedor->id])}}"> <i class="far fa-trash-alt"></i> </a>
                        </td>
                    </tr>    
                @endforeach
            
            </tbody>
        </table>
    </div>

@endsection



@section('js')

@endsection