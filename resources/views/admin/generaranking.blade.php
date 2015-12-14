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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
@section('menu-options')
    <li class="dropdown"><a href="#">Home</a></li>
    <li class="dropdown">
        <a href="#">Gestionar <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('gestionar/platos') }}">Gestionar platos</a></li>
            <li><a href="{{ url('gestionar/detalles') }}">Gestionar detalles</a></li>
            <li><a href="{{ url('gestionar/platodetalles') }}">Asignar detalles</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('asignar/menu') }}">Menú</a></li>
    <li class="dropdown">
        <a href="#">Pedido<b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
            <li><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('gestionar/chefs') }}">Chefs</a></li>
    <li class="dropdown active">
        <a href="#">Reporte<b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('reportes/ordenes') }}">Reportes Ordenes</a></li>
            <li><a href="{{ url('reporte/ranking') }}">Ranking</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <h1 >Ranking del combo más solicitado para el año {{$year}} y mes {{$month}}</h1>
    <div class="col-md-offset-1 col-md-9">
        <table class="table table-striped task-table">
            <thead>
            <th>Combo</th>
            <th>Veces solicitado</th>
            </thead>
            <tbody>
            @foreach ($ranking as $rank)
                <tr>
                    <td class="table-text"><div>{{ $rank['Combo']->nombre  }}</div></td>
                    <td class="table-text"><div>{{ $rank['Cantidad']  }}</div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-6 combo">
        <h2>Contenido</h2>
        <div class="panel-heading">
            Combo {{ $combo->nombre }}
            <span class="glyphicon glyphicon-star pull-right" aria-hidden="true" title="Combo destacado"></span>
        </div>
        <div class="panel panel-info">
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-3">Plato</th>
                        <th class="col-md-6">Descripción</th>
                        <th class="col-md-3">Precio</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($combo->platos as $plato)
                        <tr class="alto-det">
                            <td><img data-comboplato="{{ $plato->id }}" data-comboId="{{ $combo->id }}" src="{{asset('images/platos') }}/{{ $plato->imagen  }}.jpg" class="img-thumbnail combo"/></td>
                            <td>{{ $plato->nombre }}</td>
                            <td>{{ $plato->precio }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
        <form action="{{ url('reporte/ranking/pdf')}} " method="post">
            {{--target="_blank"--}}
            {{ csrf_field() }}
            <input type="hidden" name="user" value="{{$user}}">
            <input type="hidden" name="year" value="{{$year}}">
            <input type="hidden" name="month" value="{{$month}}">
            <button type="submit" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-new-window "></span>
                Generar reporte en PDF
            </button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/highcharts.js') }}"></script>
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/modules/exporting.js') }}"></script>
@endsection
