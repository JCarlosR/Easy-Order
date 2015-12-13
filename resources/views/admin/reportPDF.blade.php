<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ordenes - Easy Order</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Theme style -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('scripts/jquery.min.js') }}" type="text/javascript"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <style>

        .col
        {
            text-align:center;
            width: 227px;
            margin-left: 5px;
            height: 735px;
            display: inline-block;
            /*border: solid 2px burlywood;*/
        }
        .img-w-h
        {
            width: 110px;
            height: 100px;
        }
        .plato {
            margin:0;
            height: 140px;
        }
    </style>
</head>
<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/highcharts.js') }}"></script>
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/modules/exporting.js') }}"></script>
    <div class="row">
        <img class="limitar" src="{{ asset('images/easy.png') }}"/>
    </div>
    <h1 >Reporte de ordenes {{ $estado }} </h1>
    <div class="contenedor">
    @foreach($ordenes as $orden)
        <div class="col">
            <div >
                <label>
                    @if($user->tipo == 1)
                        <p>Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}</p>
                    @else
                        Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}
                    @endif
                </label>

                    @foreach($orden->platos as $plato)
                        <div class="plato" data-id="{{ $orden->id }}">
                            <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" data-id="{{ $plato->id }}" class="img-rounded img-w-h">
                            <p>{{ $plato->nombre }}</p>
                        </div>
                    @endforeach

                {{--<div align="center">--}}
                    {{--<span>{{ $descripcion }}</span>--}}
                    {{--<span>Chef: {{ $orden->chef->nombres or 'No Asignado' }}</span>--}}
                {{--</div>--}}
            </div>
        </div>

    @endforeach
    </div>
    <h3 >Realizado por {{ $user->full_name }} </h3>
    <div id="container"></div>
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




</body>
</html>