@extends('app')

@section('styles')
    <style>
        .row {
            margin-bottom: 1.5em;
        }
        .combo img {
            border-radius: 1.6em;
        }
        .plato {
            margin: 1.4em 0;
        }
        .plato img {
            border-radius: 10px;
            width: 200px;
            height: 150px;
            display: block;
            margin: 0 auto;
        }
        .plato input[type="checkbox"] {

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
    <h1>Realizar pedido</h1>
    <div class="row">
        <div class="col-md-6">
            <label for="tipo">Tipo de pedido:</label>
            <select name="tipo" class="form-control">
                <option value="0">Delivery</option>
                <option value="1">Pick-up</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="hora">Hora del pedido:</label>
            <input type="time" value="" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#combos">Combos</a></li>
                <li><a data-toggle="tab" href="#menu">Menú del día</a></li>
            </ul>

            <div class="tab-content">
                <!-- Tab Combos -->
                <div id="combos" class="tab-pane fade in active">
                    @include('user.tabs.combos')
                </div>
                <!-- Tab Menú del día -->
                <div id="menu" class="tab-pane fade">
                    <form action="{{ url('previsualizar') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @include('user.tabs.menu')
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection



@section('scripts')
    <script src="{{ asset('scripts/user/solicitar.js') }}"></script>
@endsection