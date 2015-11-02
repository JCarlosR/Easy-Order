@extends('app')
@section('styles')
    <style>
        .detalle {
            margin-left: 25px;
        }

        .move-right{
            margin-right: 1em;
        }
    </style>
@endsection
@section('menu-options')
    <li class="dropdown"><a href="{{ url('bienvenido/usuario') }}">Home</a></li>
    <li class="dropdown active"><a href="#">Solicitar pedido</a></li>
    <li class="dropdown"><a href="{{ url('anteriores') }}">Pedidos anteriores</a></li>
    <li class="dropdown"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <header>
                    <h1>Orden de Delivery</h1>
                </header>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span
                                            class="glyphicon glyphicon-leaf">
                    </span> Sopas y Entradas</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>Plato X</p>

                                <p class="detalle">Detalle 1</p>

                                <p class="detalle">Detalle 2</p>

                                <p class="detalle">Detalle 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span
                                            class="glyphicon glyphicon-cutlery">
                    </span> Segundos</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Plato X</p>

                                <p class="detalle">Detalle 1</p>

                                <p class="detalle">Detalle 2</p>

                                <p class="detalle">Detalle 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span
                                            class="glyphicon glyphicon-apple">
                    </span> Postres</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Plato X</p>

                                <p class="detalle">Detalle 1</p>

                                <p class="detalle">Detalle 2</p>

                                <p class="detalle">Detalle 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <span class="glyphicon glyphicon-glass"></span> Bebidas</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Plato X</p>

                                <p class="detalle">Detalle 1</p>

                                <p class="detalle">Detalle 2</p>

                                <p class="detalle">Detalle 3</p>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-offset-3 col-md-5">
                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-cutlery" aria-hidden="true" ></span> Guardar combo
                    </button>
                </div>

            </div>
            <div class="col-md-6">
                <header>
                    <h1>Detalles adicionales</h1>
                </header>
                <div class="form-group">
                    <label for="txtCantidad">Cantidad</label>
                    <input type="number" class="form-control" id="txtCantidad" placeholder="Cantidad">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Dirección</label>
                    <input type="text" class="form-control" id="txtDireccion" placeholder="Direccion">
                </div>

                <div class="form-group">
                    <label for="txtTotal">Total</label>

                    <div class="input-group">

                        <div class="input-group-addon">S/.</div>
                        <input type="text" class="form-control" id="txtTotal" readonly>

                        <div class="input-group-addon">.00</div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='confirmar'" >Continuar  <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></button>

            </div>
        </div>


    </div>
    <div id="myModal" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Asigne un nombre al combo</h4>
                </div>
                <div class="modal-body">
                    Nombre:
                    <input type="text" class="form-control">
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger move-right" data-dismiss="modal"><span class="glyphicon glyphicon-thumbs-down"></span> Cancelar</button>
                        <button class="btn btn-primary "><span class="glyphicon glyphicon-thumbs-up"></span> Guardar combo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection