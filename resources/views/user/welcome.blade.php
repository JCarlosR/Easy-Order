@extends('welcome')

@section('menu-options')
    <li class="dropdown active"><a href="#">Home</a></li>
    <li class="dropdown"><a href="{{ url('solicitar') }}">Solicitar pedido</a></li>
    <li class="dropdown"><a href="{{ url('anteriores') }}">Pedidos anteriores</a></li>
    <li class="dropdown"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection