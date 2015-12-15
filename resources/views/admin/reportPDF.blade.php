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
        .plato
        {
            margin: 1.4em 0;
            height: 165px;
        }
        .img-thumbnail {
            width: 80px;
            height: 80px;
        }

        th, td {
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
        #header{
            margin-left: 50px;
        }
        #body{
            margin-left: 50px;
        }
        #footer
        {
            margin-left:500px;
        }
        #tabla
        {
            margin-top:20px;
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
    <h1 >Reporte de ordenes {{ $estado }} al {{ $fecha }}</h1>

    @foreach($ordenes as $orden)

            <div id="tabla">
                <table align="center">
                    <tr>
                        <td colspan="3">
                            <h2>
                                @if($user->tipo == 1)
                                    <p>Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}</p>
                                @else
                                    Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}
                                @endif
                                {{ $orden->fecha }}
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>Plato</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                    </tr>
                    @foreach($orden->platos as $plato)
                        <tr class="plato" data-id="{{ $orden->id }}">
                            <td>
                            <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" class="img-rounded img-thumbnail">
                            </td>
                            <td>
                                <p>{{ $plato->nombre }}</p>
                            </td>
                            <td><p>{{ $plato->precio }}</p></td>
                        </tr>
                    @endforeach
                </table>
            </div>

    @endforeach

    <h3>Realizado por {{ $user->full_name }} </h3>
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