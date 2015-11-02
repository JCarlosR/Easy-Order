@extends('app')

@section('menu-options')
    <li class="dropdown"><a href="{{ url('bienvenido/usuario') }}">Home</a></li>
    <li class="dropdown active"><a href="#">Solicitar pedido</a></li>
    <li class="dropdown"><a href="{{ url('anteriores') }}">Pedidos anteriores</a></li>
    <li class="dropdown"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('styles')
    <style>
        input[type="checkbox"]{
            margin: 1em ;
        }
    </style>
@endsection

@section('content')
    <h1>Confirmar pago</h1>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr class="text-center">
                        <td colspan="2">DATOS</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Tipo de Orden</th>
                        <td>Delivery</td>
                    </tr>
                    <tr>
                        <th>Hora del pedido</th>
                        <td>{{ $fecha }}   -    {{ $hora }}</td>
                    </tr>
                    <tr >
                        <th>Hora de entrega</th>
                        <td>1:00pm</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>Mateo Remigio 964</td>
                    </tr>
                    <tr >
                        <th>Cliente</th>
                        <td>Pepito Ramirez</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>pepito@gmail.com</td>
                    </tr>
                    </tbody>

                </table>

            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{url('bienvenido/usuario')}}" >
                            <div class="form-group">
                            <h3 class="text-center">TIPO DE PAGO</h3>
                            <input type="text" class="form-control text-center" placeholder="CASH" disabled="true">
                            <input type="checkbox" value="" required >Aceptar términos de servicio y privacidad
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block " > <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirmar orden</button>
                            </div>
                        </form>
                    </div>

                </div>


            </div>

        </div>
    </div>
@endsection