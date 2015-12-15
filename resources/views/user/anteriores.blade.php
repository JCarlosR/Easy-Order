@extends('app')

@section('styles')
    <style>
        .img-thumbnail {
            width: 100px;
            height: 100px;
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
            <p>Listado de pedidos que se han ordenado anteriormente.</p>
        </header>
        <div class="panel-group" id="accordion">
            @foreach($ordenes as $orden)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ $orden->id }}">
                            <span class="glyphicon glyphicon-cutlery"></span> Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }} - {{ $orden->fecha }}
                        </a>
                    </h4>
                </div>
                <div id="collapseOne{{ $orden->id }}" class="panel-collapse collapse in">
                    <div class="panel-body">
                        @foreach($orden->platos as $plato)
                        <div class="col-md-3">
                            <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" class="img-thumbnail">
                            <p class="text-center">{{ $plato->nombre }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection

@section('extra-content')

@endsection

@section('scripts')
    <script src="{{ asset('scripts/user/recepcion.js') }}"></script>
@endsection