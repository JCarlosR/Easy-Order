@extends('app')

@section('styles')
    <style>
        .plato {
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
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
    <li class="dropdown active">
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
    <div class="container">

        @if($errors->count() > 0)
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>Lo sentimos!</strong> Por favor revise los siguientes errores.
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if(isset($notif))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        <strong>Éxito! </strong> {{ $notif }}
                    </div>
                </div>
            </div>
        @endif

        <div>
            <h1>Asignar detalles a platos</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($platos as $plato)
                        <div class="plato col-md-3 text-center">
                            <a href="{{ url('gestionar/platodetalles') }}/{{ $plato->id }}"><img data-id="{{ $plato->id }}" data-precio="{{$plato->precio}}" class="img-thumbnail" title="{{ $plato->descripcion }}"
                                            src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg"></a>
                            <p class="detalle">{{ $plato->nombre }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                    {{--{!! $detalles->render() !!}--}}
                </div>
            </div>
        </div>
    </div>


    <a type="button" class="btn btn-primary pull-left" href="{{ url('/') }}">Regresar</a>

@endsection

