@extends('app')
@section('styles')
    <style>
        .img-w-h
        {
            width:150px;
            height: 80px;
        }
    </style>
@endsection
@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }}">Salir</a></li>
@endsection

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h1>Pedidos en espera</h1>
        </header>
        <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <span class="glyphicon glyphicon-folder-open">
                                </span> Pedido XYZ-1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <span class="glyphicon glyphicon-folder-open">
                                </span> Pedido XYZ-2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <span class="glyphicon glyphicon-folder-open">
                                    </span> Pedido XYZ-3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <span class="glyphicon glyphicon-folder-open">
                                    </span> Pedido XYZ-4
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a data-toggle="modal" href="#myModal">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p> Nombre plato</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="btn-group pull-right">
            <button class="btn btn-primary btn-lg">
                Regresar<span class="glyphicon glyphicon-menu-right"></span>
            </button>
        </div>
    </div>
@endsection

@section('extra-content')
    <div id="myModal" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalles del plato</h4>
                </div>
                <div class="modal-body">

                    <p><strong>Plato XYZ</strong></p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <ul>
                        <li>Detalle 1</li>
                        <li>Detalle 2</li>
                        <li>Detalle 3</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger form-control" data-dismiss="modal">
                            <span class="glyphicon glyphicon-menu-up"></span> Salir
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-primary form-control">
                            Continuar<span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection