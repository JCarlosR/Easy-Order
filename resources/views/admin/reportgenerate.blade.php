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
    <li class="dropdown ">
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
    <h1 >Reporte de ordenes {{ $descripcion }} al {{ $fecha }}</h1>
    @foreach($ordenes as $orden)
        <div class="col-md-4">
            <div class="panel panel-default" >
                <h3 class="panel-heading">
                    @if($user->tipo == 1)
                        <a href="{{ asset('pedidos/pendientes') }}/{{ $orden->id }}" >Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}</a>
                    @else
                        Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}
                    @endif
                    {{ $orden->fecha }}
                </h3>
                <div class="panel-body">
                    @foreach($orden->platos as $plato)
                        <div class="plato col-md-6" data-id="{{ $orden->id }}">
                            <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" data-id="{{ $plato->id }}" class="img-rounded img-w-h">
                            <p>{{ $plato->nombre }}</p>
                        </div>
                    @endforeach
                </div>
                <div align="center">
                    <h3 class="panel-footer">
                        <span class="label label-{{ $orden->estadodesc->color }}">{{ $orden->estadodesc->descripcion }}</span>
                        <br>
                        <span>Chef: {{ $orden->chef->nombres or 'No Asignado' }}</span>
                    </h3>

                </div>
            </div>
        </div>

    @endforeach

    <div id="container"></div>
    <div class="col-md-6 col-md-offset-3">
        <form action="{{ url('reporte/ordenes/pdf')}} " method="post">
            {{--target="_blank"--}}
            {{ csrf_field() }}
            <input type="hidden" name="fechaInic" value="{{$fechaInic}}">
            <input type="hidden" name="fechaFin" value="{{$fechaFin}}">
            <input type="hidden" name="estado" value="{{$estado}}">

            <button type="submit" class="btn btn-block btn-warning">
                <span class="glyphicon glyphicon-new-window "></span>
                Generar reporte en PDF
            </button>
        </form>
    </div>

    <h3 class="pull-right">Realizado por {{ $user->full_name }} </h3>

    <script>

        $(function () {
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'REPORTE DE ORDENES CONFIRMADAS Y EN ESPERA ENTRE EL {{$fechaInic}} Y EL {{$fechaFin}}'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Ordenes',
                    data: [
                        ['{{ $espera }}', {{ $cantEspera }}],
                        ['{{ $confirmado }}', {{ $cantConfirmado }}]
                    ]
                }]
            });
        });


    </script>



@endsection



@section('scripts')


    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/highcharts.js') }}"></script>
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/modules/exporting.js') }}"></script>
@endsection
