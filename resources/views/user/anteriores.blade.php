@extends('app')

@section('styles')
    <style>
        .pointer {
            cursor: pointer;
        }

        .modal-body {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href="{{ url('bienvenido/usuario') }}">Home</a></li>
    <li class="dropdown"><a href="{{ url('solicitar') }}">Solicitar pedido</a></li>
    <li class="dropdown active"><a href="{{ url('anteriores') }}">Pedidos anteriores</a></li>
    <li class="dropdown"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <div class="col-md-offset-3 col-md-6">
        <header>
            <h1 class="text-center">Pedidos anteriores</h1>
            <p>Listado de pedidos que se han ordenadp anteriormente.</p>
        </header>

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-cutlery"></span> COMBO XYZ1
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/1" width="100"
                                 height="100">
                            <p class="text-center">ENTRADA</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/2" width="100"
                                 height="100">
                            <p class="text-center">SEGUNDO</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/3" width="100"
                                 height="100">
                            <p class="text-center">POSTRE</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/4" width="100"
                                 height="100">
                            <p class="text-center">BEBIDA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <span class="glyphicon glyphicon-cutlery"></span> COMBO XYZ
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/1" width="100"
                                 height="100">
                            <p class="text-center">ENTRADA</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/2" width="100"
                                 height="100">
                            <p class="text-center">SEGUNDO</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/3" width="100"
                                 height="100">
                            <p class="text-center">POSTRE</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/4" width="100"
                                 height="100">
                            <p class="text-center">BEBIDA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <span class="glyphicon glyphicon-cutlery"></span> COMBO XYZ
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/1" width="100"
                                 height="100">
                            <p class="text-center">ENTRADA</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/2" width="100"
                                 height="100">
                            <p class="text-center">SEGUNDO</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/3" width="100"
                                 height="100">
                            <p class="text-center">POSTRE</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/4" width="100"
                                 height="100">
                            <p class="text-center">BEBIDA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            <span class="glyphicon glyphicon-cutlery"></span> COMBO XYZ
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/1" width="100"
                                 height="100">
                            <p class="text-center">ENTRADA</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/2" width="100"
                                 height="100">
                            <p class="text-center">SEGUNDO</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/3" width="100"
                                 height="100">
                            <p class="text-center">POSTRE</p>
                        </div>
                        <div class="col-md-3">
                            <img class="plato pointer" src="http://lorempixel.com/140/140/food/4" width="100"
                                 height="100">
                            <p class="text-center">BEBIDA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('extra-content')
    <div id="modalDetalle" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Detalles del plato</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/1" width="60" height="60">
                            <label>Sin menestra</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/2" width="80" height="80">
                            <label>Con papa frita</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/3" width="80" height="80">
                            <label>Con papa sanchocada</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/4" width="80" height="80">
                            <label>Una presa adicional</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/3" width="80" height="80">
                            <label>Con papa sanchocada</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/4" width="80" height="80">
                            <label>Una presa adicional</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/3" width="80" height="80">
                            <label>Con papa sanchocada</label>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger move-right" data-dismiss="modal">
                        <span class="glyphicon glyphicon-thumbs-down"></span> Cancelar
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/user/recepcion.js') }}"></script>
@endsection