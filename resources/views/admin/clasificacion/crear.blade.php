@extends('layouts.admin')

@section('body')

    <div clas="container-fluid">
        <div class="row mr-2 ml-2">

            <div class="col-lg-9">
                <h1 class="font-weight-bold mb-0" >Clasificaciones</h1>
                <p class="lead text-muted" > Añade una clasificacion a la lista </p>
            </div>

            <div class="col-lg-3 d-flex">
                <button class="btn btn-secondary w-100 align-self-center"> <a href="{{route('admin::producto.index')}}"> Volver </a> </button>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="card rounded-0 mt-3">

            <div class="card-body">
                    <form action="{{route('admin::clasificacion.crear')}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                
                                    <div class="form-group my-2">
                                        <label for="nombre"> Nombre </label>
                                        <input type="text" name="nombre" id="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary d-flex ml-auto"> Añadir </button>
                                
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