<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ranking - Easy Order</title>
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


    </style>
</head>
<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/highcharts.js') }}"></script>
    <script src="{{ asset('scripts/admin/Highcharts-4.1.5/js/modules/exporting.js') }}"></script>
    <div class="row">
        <img class="limitar" src="{{ asset('images/easy.png') }}"/>
    </div>
    <div class="contenedor">
        <div id="header">
            <h2>Ranking del combo más solicitado para {{$month}} - {{$year}}</h2>
        </div>
        <div id="body">
            <div>
                <table>
                    <thead>
                    <tr>
                        <th>Nombre de Combo</th>
                        <th>Veces solicitado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ranking as $rank)
                        <tr>
                            <td>{{ $rank['Combo'] }}</td>
                            <td>{{ $rank['Cantidad'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div id="tabla">
                <h3>Contenido del combo  {{ $combo->nombre }} </h3>
                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>Plato</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($combo->platos as $plato)
                            <tr>
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
        <div id="footer">
            <p>Usuario:  {{ $usuario }}</p>
            <p>Fecha: {{$fecha}}</p>
        </div>

    </div>
</body>
</html>