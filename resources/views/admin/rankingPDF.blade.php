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
    <div class="contenedor">
        <h1 >Ranking del combo más solicitado para el año {{$year}} y mes {{$month}}</h1>
        <div>
            <table>
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

        <div>
            <h2>Contenido</h2>
            <div>
               <label>Combo {{ $combo->nombre }}</label>
            </div>
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
</body>
</html>