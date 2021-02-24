@extends('layouts.admin')

@section('body')

    <div clas="container-fluid">
        <div class="row mr-2 ml-2">

            <div class="col-lg-9">
                <h1 class="font-weight-bold mb-0" >Bienvenido Christian</h1>
                <p class="lead text-muted" > Revisa la última información </p>
            </div>

            <div class="col-lg-3 d-flex">
                <button class="btn btn-primary w-100 align-self-center"> Descargar info </button>
            </div>

        </div>
    </div>

    <section class="bg-mix">
        <div class="container-fluid">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted"> Ingresos Mensuales </h6>
                                <h3 class="font-weight-bold"> $50.000 </h3>
                                <h6 class="text-success"> <i class="fas fa-tooth"></i> 50.50% </h6>
                            </div>
                        </div>

                        <div class="col-lg-3 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted"> Ingresos Mensuales </h6>
                                <h3 class="font-weight-bold"> $50.000 </h3>
                                <h6 class="text-success"> <i class="fas fa-tooth"></i> 50.50% </h6>
                            </div>
                        </div>

                        <div class="col-lg-3 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted"> Ingresos Mensuales </h6>
                                <h3 class="font-weight-bold"> $50.000 </h3>
                                <h6 class="text-success"> <i class="fas fa-tooth"></i> 50.50% </h6>
                            </div>
                        </div>

                        <div class="col-lg-3 d-flex my-3">            
                            <div class="mx-auto">
                                <h6 class="text-muted"> Ingresos Mensuales </h6>
                                <h3 class="font-weight-bold"> $50.000 </h3>
                                <h6 class="text-success"> <i class="fas fa-tooth"></i> 50.50% </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-grey">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 my-3">
                    <div class="card rounded-0">

                        <div class="card-header bg-light">
                            <h6  class="font-weight-bold mb-0"> Número de usuarios de paga </h6>
                        </div>

                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="card rounded-0">
                        <div class="card-header bg-light">
                            <h6 class="font-weight-bold mb-0"> Ventas recientes </h6>
                        </div>
                        <div class="card-body pt-2">
                            <div class="d-flex border-bottom py-2">
                                <div class="d-flex  mr-3">
                                    <h2 class="align-self-center mb-0"> <i class="fas fa-tooth"></i> </h2>
                                </div>
                                <div class="align-self-center">
                                    <h6 class="d-inline-block mb-0"> $250 </h6><span class="badge badge-success ml-2"> 10% descuento </span>
                                    <small class="d-block text-muted"> La mejor tienda </small>
                                </div>
                            </div>

                            <div class="d-flex border-bottom py-2">
                                <div class="d-flex  mr-3">
                                    <h2 class="align-self-center mb-0"> <i class="fas fa-tooth"></i> </h2>
                                </div>
                                <div class="align-self-center">
                                    <h6 class="d-inline-block mb-0"> $250 </h6><span class="badge badge-success ml-2"> 10% descuento </span>
                                    <small class="d-block text-muted"> La mejor tienda </small>
                                </div>
                            </div>

                            <button class="btn btn-primary w-100">
                                Ver todas
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
   
@endsection