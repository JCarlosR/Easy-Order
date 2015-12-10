@extends('app')
@section('styles')
    <style>
        .detalle {
            margin-left: 25px;
        }

        .move-right {
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
                    <h1>Orden de delivery</h1>
                </header>
                <input type="hidden" id="comboID" value="{{ $combo_id }}">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-leaf"></span> Sopas y Entradas
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                @if($entradas)
                                    @foreach($entradas as $entrada)
                                        <p>
                                            {{ $entrada->nombre }}
                                            <strong class="pull-right">S/. {{ $entrada->precio }}</strong>
                                        </p>

                                        @if($detalles[$entrada->id])
                                            @foreach($detalles[$entrada->id] as $detalle)
                                                <p class="detalle">
                                                    {{ $detalle->nombre }}
                                                    <span class="pull-right">S/. {{ $detalle->precio }}</span>
                                                </p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <span class="glyphicon glyphicon-cutlery"></span> Segundos</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                @if($segundos)
                                    @foreach($segundos as $segundo)
                                        <p>{{ $segundo->nombre }}<span
                                                    class="pull-right">S/. {{ $segundo->precio }}</span></p>
                                        @if($detalles[$segundo->id])
                                            @foreach($detalles[$segundo->id] as $detalle)
                                                <p class="detalle">{{ $detalle->nombre }}<span
                                                            class="pull-right">S/. {{ $detalle->precio }}</span></p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <span class="glyphicon glyphicon-apple"></span> Postres
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                @if($postres)
                                    @foreach($postres as $postre)
                                        <p>
                                            {{ $postre->nombre }} 
                                            <span class="pull-right">S/. {{ $postre->precio }}</span>
                                        </p>
                                        @if($detalles[$postre->id])
                                            @foreach($detalles[$postre->id] as $detalle)
                                                <p class="detalle">
                                                    {{ $detalle->nombre }}
                                                    <span class="pull-right">S/. {{ $detalle->precio }}</span>
                                                </p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <span class="glyphicon glyphicon-glass"></span> Bebidas
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                @if($bebidas)
                                    @foreach($bebidas as $bebida)
                                        <p>
                                            {{ $bebida->nombre }}
                                            <span class="pull-right">S/. {{ $bebida->precio }}</span>
                                        </p>
                                        @if($detalles[$bebida->id])
                                            @foreach($detalles[$bebida->id] as $detalle)
                                                <p class="detalle">
                                                    {{ $detalle->nombre }}
                                                    <span class="pull-right">S/. {{ $detalle->precio }}</span>
                                                </p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-offset-3 col-md-5">
                    <button type="button" id="btnGuardarCombo" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalNuevoCombo">
                        <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Guardar combo
                    </button>
                </div>

            </div>
            <div class="col-md-6">
                <header>
                    <h1>Detalles adicionales</h1>
                </header>
                <form action="{{ url('confirmar') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" placeholder="Cantidad" value="1" readonly>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección destino" required>
                    </div>

                    <div class="form-group">
                        <label for="total">Total</label>
                        <div class="input-group">
                            <div class="input-group-addon">S/.</div>
                            <input type="text" class="form-control" name="total" readonly value="{{ $total }}" required>
                        </div>
                    </div>
                    <div id="modalNuevoCombo" class="modal fade in">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Asigne un nombre al combo</h4>
                                </div>
                                <div class="modal-body">
                                    Nombre:
                                    <input type="text" name="comboName" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group">
                                        <button class="btn btn-success move-right" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-thumbs-down"></span> Aceptar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Continuar <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>


    </div>

@endsection

@section('scripts')
    <script src="{{ asset('scripts/user/orden.js') }}"></script>
@endsection