@extends('app')

@section('styles')
    <style>
        .img-w-h
        {
            width:150px;
            height: 80px;
        }
        .plato {
            margin: 1.4em 0;
            height: 165px;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
    <li class="dropdown"><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
    <li class="dropdown active"><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
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
                    @foreach($ordenesD as $orden)
                        <div class="col-md-4">
                            <div class="panel panel-default" >
                                <h3 class="panel-heading">Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }} - {{ $orden->fecha }}</h3>
                                <div class="panel-body">
                                    @foreach($orden->platos as $plato)
                                        <div class="plato col-md-6" data-id="{{ $orden->id }}">
                                            <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" data-id="{{ $plato->id }}" class="img-rounded img-w-h">
                                            <p>{{ $plato->nombre }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="tab-pane fade" id="pickUp">
                    @foreach($ordenesP as $orden)
                        <div class="col-md-4">
                            <div class="panel panel-default" >
                                <h3 class="panel-heading">Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }} - {{ $orden->fecha }}</h3>
                                <div class="panel-body">
                                    @foreach($orden->platos as $plato)
                                        <div class="plato col-md-6" data-id="{{ $orden->id }}">
                                            <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" data-id="{{ $plato->id }}" class="img-rounded img-w-h">
                                            <p>{{ $plato->nombre }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <p><strong></strong></p>
                </div>
                <div class="modal-body">
                    <ul>
                    </ul>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger form-control" id="cerrar"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/entregados.js') }}"></script>
@endsection