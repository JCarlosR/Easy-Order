@extends('app')

@section('styles')
    <style>
        .img-w-h
        {
            width: 100px;
            height: 100px;
        }
        .plato {
            margin: 1.4em 0;
            height: 165px;
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
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default" >
                    <h3 class="panel-heading">Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}</h3>
                    <div class="panel-body">
                        @foreach($orden->platos as $plato)
                            <div class="plato col-md-6" data-id="{{ $orden->id }}">
                                <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" data-id="{{ $plato->id }}" class="img-rounded img-w-h">
                                <p>{{ $plato->nombre }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div align="center">
                        <h3 class="panel-footer"><span class="label label-{{ $orden->estadodesc->color }}">{{ $orden->estadodesc->descripcion }}</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1>Modificar Estado del Pedido</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                    @if($estados->count() == 0)
                        <p><h3>Esta orden ya se ha preparado.</h3></p>
                    @else
                    @foreach($estados as $estado)
                            <button type="button" class="btn btn-{{ $estado->color }} btn-block" data-id="{{ $orden->id }}" data-name="{{ $estado->nombre }}"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> {{ $estado->descripcion }}</button>
                            <br>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
            <script src="{{ asset('scripts/admin/gestionar-pendientes.js') }}"></script>
@endsection