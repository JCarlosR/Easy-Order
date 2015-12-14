@extends('app')

@section('styles')
    <style>
        .plato{
            margin: 1.4em 0;
            height: 165px;
        }
        .img-thumbnail {
            width: 100px;
            height: 100px;
        }
        .detalle{
            line-height: 100%;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('scripts/admin/jquery.datetimepicker.css') }}"/>

@endsection

@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
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
        <a href="#">Reporte <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('reportes/ordenes') }}">Reportes Ordenes</a></li>
            <li><a href="{{ url('reporte/ranking') }}">Ranking</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <h1 > Ranking del combo más solicitado </h1>
    <div class="col-md-12 ">
        <form action="{{ url('reporte/ranking/generar') }}" method="POST" id="formulario">
            {{ csrf_field() }}
            <div class="col-md-6 col-md-offset-5">
                <div class="form-group">
                    <h3>Fecha</h3>
                    <input type="text" name="fecha" class="datatime"/>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" id="btnGenerar" value="Generar reporte"/>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ asset('scripts/admin/reporte.js') }}"></script>
@endsection