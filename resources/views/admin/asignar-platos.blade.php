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
@endsection

@section('menu-options')
    <li class="dropdown"><a href="#">Home</a></li>
    <li class="dropdown">
        <a href="#">Platos y detalles <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('gestionar/platos') }}">Gestionar platos</a></li>
            <li><a href="{{ url('gestionar/detalles') }}">Gestionar detalles</a></li>
        </ul>
    </li>
    <li class="dropdown active"><a href="{{ url('asignar/menu') }}">Menú del día</a></li>
    <li class="dropdown">
        <a href="#">Pedidos <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
            <li><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('gestionar/chefs') }}">Chefs</a></li>

    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <h1>Asignar platos del día</h1>
    <div class="col-md-12">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Platos para seleccionar</div>
                <div id="original" class="panel-body">
                    @foreach($noAsignados as $plato)
                    <div id="ele{{ $plato->id }}" class="plato col-md-4 text-center">
                        <img  class="img-thumbnail img-rounded" src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg">
                        <input type="checkbox" name="origen" value="ele{{ $plato->id }}"/> <p class="detalle">{{ $plato->nombre }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="">
                <button type="button" class="btn btn-info margen btn-block" onclick="copiar();">Trasladar <span class="glyphicon glyphicon-forward" ></span> </button>
                <button type="button" class="btn btn-warning btn-block" onclick="devolver();"> <span class="glyphicon glyphicon-backward" ></span> Devolver</button>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Platos seleccionados</div>
                <div id="copia" class="panel-body" >

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-md-12">
    <a type="button" class="btn btn-primary pull-right" href="bienvenido/welcome">Regresar</a>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/asignar-platos.js') }}"></script>
@endsection