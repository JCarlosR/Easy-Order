@extends('welcome')

@section('menu-options')
    <li class="dropdown active"><a href="#">Home</a></li>
    <li class="dropdown"><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
    <li class="dropdown"><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection