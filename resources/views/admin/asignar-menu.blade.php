@extends('app')

@section('styles')
    <style>
        .img-w-h {
            width: 200px;
            height: 150px;
        }
    </style>
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
    <li class="dropdown active"><a href="{{ url('asignar/menu') }}">Menú</a></li>
    <li class="dropdown">
        <a href="#">Pedido<b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
            <li><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('gestionar/chefs') }}">Chefs</a></li>
    <li class="dropdown">
        <a href="#">Reporte <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('reportes/ordenes') }}">Reportes Ordenes</a></li>
            <li><a href="{{ url('#') }}">Otros</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    @for($i=0; $i<7; ++$i)
                    <li @if($i==0) class="active" @endif>
                        <a href="#{{ $diasSlug[$i]  }}" data-toggle="tab">{{ $diasName[$i]  }}</a>
                    </li>
                    @endfor
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">

                    @foreach($diasSlug as $dia)
                    <div class="tab-pane fade @if ($dia=="lunes") active in @endif" id="{{ $dia }}">
                        @foreach($tipos as $tipo)
                            <a href="{{ url('asignar/platos') }}/{{ $dia }}/{{ $tipo->descripcion }}" class="col-md-3">
                                <div class="panel panel-default">
                                    <h3 class="panel-heading">{{ $tipo->descripcion }}</h3>
                                    <div class="panel-body">
                                        <img src="{{ asset('images/tipos') }}/{{ $tipo->descripcion }}.jpg" class="img-rounded img-w-h">
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection