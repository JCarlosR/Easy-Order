@extends('app')

@section('styles')
    <style>
        .row {
            margin-bottom: 1.5em;
        }
        .combo img {
            border-radius: 1.6em;
        }
        .plato {
            margin: 1.4em 0;
        }
        .plato img {
            border-radius: 10px;
            width: 200px;
            height: 150px;
            display: block;
            margin: 0 auto;
        }
        .alto-det {
            height: 70px;
        }
        .vista {
            float: left;
            border: 10px solid #fff;
            overflow: hidden;
            position: relative;
            text-align: center;
            box-shadow: 1px 1px 2px #e6e6e6;
            cursor: default;
        }
        .vista .mascara, .vista .contenido {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
        }
        .vista img {
            display: block;
            position: relative;
        }
        .vista h2 {
            height: 40px;
            top: -20px;
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            vert-align: middle;
            font-size: 12px;
            background: hsla(0,0%,0%,0.8);
        }
        .vista p {
            top: -20px;
            font-family: Georgia, serif;
            font-style: italic;
            font-size: 12px;
            position: relative;
            color: #fff;
            /*padding: 10px 20px 20px;*/
            text-align: center;
        }

        .vista label.informacion {

            display: inline-block;
            text-decoration: none;
            padding: 0px 14px;
            background: #000;
            color: #fff;
            text-transform: uppercase;
            box-shadow: 0 0 1px #000;
            font-size: 10px;
        }
        .vista label.informacion:hover {
            box-shadow: 0 0 5px #000;
        }
        /******************************************************************************/
        /* Estilos para ejemplo 3 */
        .vista img {
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }
        .vista .mascara {
            opacity: 0;
            background-color: hsla(0,0%,0%,0.6);
            -webkit-transition: all 0.2s 0.4s ease-in-out;
            -moz-transition: all 0.2s 0.4s ease-in-out;
            -o-transition: all 0.2s 0.4s ease-in-out;
            -ms-transition: all 0.2s 0.4s ease-in-out;
            transition: all 0.2s 0.4s ease-in-out;
            -webkit-transform: translate(460px, -100px) rotate(180deg);
            -moz-transform: translate(460px, -100px) rotate(180deg);
            -o-transform: translate(460px, -100px) rotate(180deg);
            -ms-transform: translate(460px, -100px) rotate(180deg);
            transform: translate(460px, -100px) rotate(180deg);
        }
        .vista h2 {
            -webkit-transform: translateY(-100px);
            -moz-transform: translateY(-100px);
            -o-transform: translateY(-100px);
            -ms-transform: translateY(-100px);
            transform: translateY(-100px);
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }
        .vista p {
            -webkit-transform: translateX(300px) rotate(90deg);
            -moz-transform: translateX(300px) rotate(90deg);
            -o-transform: translateX(300px) rotate(90deg);
            -ms-transform: translateX(300px) rotate(90deg);
            transform: translateX(300px) rotate(90deg);
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }
        .vista label.informacion{
            -webkit-transform: translateY(-200px);
            -moz-transform: translateY(-200px);
            -o-transform: translateY(-200px);
            -ms-transform: translateY(-200px);
            transform: translateY(-200px);
            -webkit-transition: all 0.2s 0.1s ease-in-out;
            -moz-transition: all 0.2s 0.1s ease-in-out;
            -o-transition: all 0.2s 0.1s ease-in-out;
            -ms-transition: all 0.2s 0.1s ease-in-out;
            transition: all 0.2s 0.1s ease-in-out;
        }
        .vista:hover .mascara {
            opacity: 1;
            -webkit-transform: translate(0px, 0px);
            -moz-transform: translate(0px, 0px);
            -o-transform: translate(0px, 0px);
            -ms-transform: translate(0px, 0px);
            transform: translate(0px, 0px);
            -webkit-transition-delay: 0s;
            -moz-transition-delay: 0s;
            -o-transition-delay: 0s;
            -ms-transition-delay: 0s;
            transition-delay: 0s;
        }
        .vista:hover h2 {
            -webkit-transform: translateY(0px);
            -moz-transform: translateY(0px);
            -o-transform: translateY(0px);
            -ms-transform: translateY(0px);
            transform: translateY(0px);
            -webkit-transition-delay: 0.5s;
            -moz-transition-delay: 0.5s;
            -o-transition-delay: 0.5s;
            -ms-transition-delay: 0.5s;
            transition-delay: 0.5s;
        }
        .vista:hover p {
            -webkit-transform: translateX(0px) rotate(0deg);
            -moz-transform: translateX(0px) rotate(0deg);
            -o-transform: translateX(0px) rotate(0deg);
            -ms-transform: translateX(0px) rotate(0deg);
            transform: translateX(0px) rotate(0deg);
            -webkit-transition-delay: 0.4s;
            -moz-transition-delay: 0.4s;
            -o-transition-delay: 0.4s;
            -ms-transition-delay: 0.4s;
            transition-delay: 0.4s;
        }
        .vista:hover label.informacion {
            -webkit-transform: translateY(-18px);
            -moz-transform: translateY(-18px);
            -o-transform: translateY(-18px);
            -ms-transform: translateY(-18px);
            transform: translateY(-18px);
            -webkit-transition-delay: 0.3s;
            -moz-transition-delay: 0.3s;
            -o-transition-delay: 0.3s;
            -ms-transition-delay: 0.3s;
            transition-delay: 0.3s;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href="{{ url('bienvenido/usuario') }}">Home</a></li>
    <li class="dropdown active"><a href="#">Solicitar pedido</a></li>
    <li class="dropdown"><a href="{{ url('anteriores') }}">Pedidos anteriores</a></li>
    <li class="dropdown"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    @if (session('information'))
        <div class="alert alert-danger">
            {{ session('information') }}
        </div>
    @endif
    @if (session('notif'))
        <div class="alert alert-success">
            {{ session('notif') }}
        </div>
    @endif
    <form action="{{ url('previsualizar') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1>Realizar pedido</h1>
        <div class="row">
            <div class="col-md-6">
                <label for="tipo">Tipo de pedido:</label>
                <select name="tipo_orden" class="form-control">
                    <option value="0">Delivery</option>
                    <option value="1">Pick-up</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="hora">Hora del pedido:</label>
                <input type="time" name="hora" value="{{ $hora }}" readonly class="form-control"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#combos">Combos</a></li>
                    <li><a data-toggle="tab" href="#menu">Menú del día</a></li>
                </ul>

                <div class="tab-content">
                    <!-- Tab Combos -->
                    <div id="combos" class="tab-pane fade in active">
                        @include('user.tabs.combos')
                    </div>
                    <!-- Tab Menú del día -->
                    <div id="menu" class="tab-pane fade">
                            @include('user.tabs.menu')
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection



@section('scripts')
    <script src="{{ asset('scripts/user/solicitar.js') }}"></script>
@endsection