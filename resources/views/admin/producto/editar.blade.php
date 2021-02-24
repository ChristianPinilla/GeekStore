@extends('layouts.admin')

@section('body')

    <div clas="container-fluid">
        <div class="row mr-2 ml-2">

            <div class="col-lg-9">
                <h1 class="font-weight-bold mb-0" >Productos</h1>
                <p class="lead text-muted" > Edita el producto </p>
            </div>

            <div class="col-lg-3 d-flex">
                <button class="btn btn-secondary w-100 align-self-center"> <a href="{{route('admin::producto.index')}}"> Volver </a> </button>
            </div>

        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card rounded-0 mt-3">

            <div class="card-body">
                    <form action="{{route('admin::producto.actualizar',$producto->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        <div class="row">
                            <div class="col-6">

                                <div class="form-group">
                                    <label for=""> 
                                        <i data-toggle="tooltip" data-placement="top" 
                                        title="Esta imagen es la tendrá el producto al entrar a su página" 
                                        class="fas fa-question-circle" style="font-size: 150%; color:blue; cursor:pointer"></i>
                                    </label>
                                    @if ( $producto->imagen != '' )
                                        <img src="{{Storage::url($producto->imagen)}}" class="card-img img-fluid rounded imagen-form">
                                    @else
                                        <svg class="card-img img-fluid rounded" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" 
                                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"/>
                                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    @endif
                                    <label for="imagen"></label>
                                    <div class="custom-file">
                                        <input  type="file" id="imagen" name="imagen" class="custom-file-input">
                                        <label for="imagen" class="custom-file-label" data-browse="Examinar">Seleccione la imagen de detalle</label>
                                    </div>
                                    <small>Tamaño recomendado: 1800x500 px</small>
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        <i class="fas fa-question-circle" style="font-size: 150%; color:blue; cursor:pointer"
                                        data-toggle="tooltip" data-placement="top" 
                                        title="Esta imagen es la tendrá el producto al ser visto como estreno en el inicio de la página">
                                        </i>
                                    </label>
                                    @if ( $producto->imagen_estreno != '' )
                                            <img src="{{Storage::url($producto->imagen_estreno)}}" class="card-img img-fluid rounded imagen-form">
                                       
                                    @else
                                        <svg class="card-img img-fluid rounded" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" 
                                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"/>
                                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    @endif
                                    <label for="imagen_estreno"></label>
                                    <div class="custom-file">
                                        <input  type="file" id="imagen_estreno" name="imagen_estreno" class="custom-file-input">
                                        <label for="imagen_estreno" class="custom-file-label" data-browse="Examinar">Seleccione la imagen de estreno</label>
                                    </div>
                                    <small>Tamaño recomendado: 1800x500 px</small>
                                </div>
                                
                            </div>
                            <div class="col-6 my-auto">
                                
                                    <div class="form-group mb-4">
                                        <label for="nombre"> Nombre </label>
                                        <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    </div>
                                    
                                    <div class="form-row my-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="clasificacion"> Clasificacion </label>
                                                <select name="clasificacion_id" id="clasificacion_id" class="form-control" >
                                                    @foreach ($clasificaciones as $clasificacion)
                                                        @if ( $producto->clasificacion_id == $clasificacion->id )
                                                            <option value="{{$clasificacion->id}}" selected>{{$clasificacion->nombre}}</option>
                                                        @else
                                                            <option value="{{$clasificacion->id}}">{{$clasificacion->nombre}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="proveedor"> Proveedor </label>
                                                <select name="proveedor_id" id="proveedor_id" class="form-control" >
                                                    @foreach ($proveedores as $proveedor)
                                                    @if ( $producto->proveedor_id == $proveedor->id )
                                                        <option value="{{$proveedor->id}}" selected>{{$proveedor->nombre}}</option>
                                                    @else
                                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="precio_unidad"> Precio Unidad </label>
                                        <input type="number" name="precio_unidad" id="precio_unidad" value="{{$producto->precio_unidad}}" class="form-control {{ $errors->has('precio_unidad') ? ' is-invalid' : '' }}" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('precio_unidad') }}</strong>
                                        </span>
                                    </div>
                                    <div class="form-row my-2">
                                        <div class="col-6">
                                            <label for="stock_actual"> Stock Actual </label>
                                            <input type="number" name="stock_actual" id="stock_actual" value="{{$producto->stock_actual}}" class="form-control {{ $errors->has('stock_actual') ? ' is-invalid' : '' }}" >
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stock_actual') }}</strong>
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <label for="stock_critico"> Stock Crítico </label>
                                            <input type="number" name="stock_critico" id="stock_critico" value="{{$producto->stock_critico}}" class="form-control {{ $errors->has('stock_critico') ? ' is-invalid' : '' }}" >
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stock_critico') }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary d-flex ml-auto"> Actualizar </button>
                                
                            </div>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
        
    </div>

@endsection

@section('js')

@endsection