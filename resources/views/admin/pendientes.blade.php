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
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
    <li class="dropdown active"><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
    <li class="dropdown"><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#delivery" data-toggle="tab">Delivery</a></li>
                <li class=""><a href="#pickUp" data-toggle="tab">Pick Up</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade active in" id="delivery">
                    <div class="col-md-4">
                        <div class="panel panel-default" >
                            <h3 class="panel-heading">Pedido 1</h3>
                            <div class="panel-body">
                                <a href="#myModal" data-toggle="modal" class="col-md-6" >
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a harf="#" class="col-md-6" >
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6" >
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="panel panel-default">
                            <h3 class="panel-heading">Pedido 2</h3>
                            <div class="panel-body">
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <h3 class="panel-heading">Pedido 3</h3>
                            <div class="panel-body">
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pickUp">
                    <div class="col-md-4">
                        <div class="panel panel-default" >
                            <h3 class="panel-heading">Pedido 1</h3>
                            <div class="panel-body">
                                <a href="#myModal" data-toggle="modal" class="col-md-6" >
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a harf="#" class="col-md-6" >
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6">
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6" >
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col-md-6" >
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="panel panel-default">
                            <h3 class="panel-heading">Pedido 2</h3>
                            <div class="panel-body">
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <h3 class="panel-heading">Pedido 3</h3>
                            <div class="panel-body">
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/1.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/2.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/4.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                                <a href="#" class="col col-md-6">
                                    <img src="{{ asset('images/3.jpg') }}" class="img-rounded img-w-h">
                                    <p>Nombre plato</p>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
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
                        <button class="btn btn-danger form-control" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection