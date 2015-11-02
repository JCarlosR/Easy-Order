@extends('app')

@section('styles')
    <style>
        .img-w-h {
            width: 200px;
            height: 150px;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href=" {{ url('guardarPlato') }} ">Guardar Plato</a></li>
    <li class="dropdown"><a href=" {{ url('pedidosPendientes') }}">P. Pendientes</a></li>
    <li class="dropdown"><a href=" {{ url('pedidosEntregados') }}">P. Entregados</a></li>
    <li class="dropdown active"><a href=" {{ url('asignarMenu') }}">Asignar Menús</a></li>
    <li class="dropdown"><a href="{{ url('/') }}">Cerrar sesión</a></li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#lunes" data-toggle="tab">Lunes</a></li>
                    <li class=""><a href="#martes" data-toggle="tab">Martes</a></li>
                    <li class=""><a href="#miercoles" data-toggle="tab">Miercoles</a></li>
                    <li class=""><a href="#jueves" data-toggle="tab">Jueves</a></li>
                    <li class=""><a href="#viernes" data-toggle="tab">Viernes</a></li>
                    <li class=""><a href="#sabado" data-toggle="tab">Sábado</a></li>
                    <li class=""><a href="#domingo" data-toggle="tab">Domingo</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="lunes">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="tab-pane fade" id="martes">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="tab-pane fade" id="miercoles">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="tab-pane fade" id="jueves">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="tab-pane fade" id="viernes">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="tab-pane fade" id="sabado">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tab-pane fade" id="domingo">
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Entradas / Sopas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/entrada.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Segundos</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/segundo.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Postres</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/postre.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-3">
                            <div class="panel panel-default">
                                <h3 class="panel-heading">Bebidas</h3>
                                <div class="panel-body">
                                    <img src="{{ asset('images/bebida.jpg') }}" class="img-rounded img-w-h">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection