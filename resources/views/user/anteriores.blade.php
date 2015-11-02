@extends('app')

@section('menu-options')
    <li class="dropdown"><a href="{{ url('bienvenido/usuario') }}">Home</a></li>
    <li class="dropdown"><a href="{{ url('solicitar') }}">Solicitar pedido</a></li>
    <li class="dropdown active"><a href="#">Pedidos anteriores</a></li>
    <li class="dropdown"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <header>
        <h1>Pedidos anteriores</h1>
    </header>
    <div class="col-md-offset-2 col-md-8">
        <h3>Pedido 1</h3>
        <p></p>
        <p></p>
        <h3>Pedido 2</h3>
        <p></p>
        <p></p>
        <h3>Pedido 3</h3>
        <p></p>
        <p></p>
        <h3>Pedido 4</h3>
        <p></p>
        <p></p>
    </div>    
@endsection