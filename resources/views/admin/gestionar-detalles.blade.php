@extends('app')

@section('styles')
    <style>
        .plato{
            margin: 1.4em 0;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href="#">Galería</a></li>
    <li class="dropdown active"><a href="#">Solicitar</a></li>
    <li class="dropdown"><a href="#">Menús anteriores</a></li>
    <li class="dropdown"><a href="{{ url('seguimientoOrden') }}">Confirmar</a></li>
    <li class="dropdown"><a href="{{ url('/') }}">Cerrar sesión</a></li>
@endsection

@section('content')
    <div class="container">
        <h1>Gestionar detalles del plato XYZ</h1>
        <div class="panel panel-default col-md-12">
            <div id="original" class="panel-body miDiv ">
                <div id="ele" class="plato col-md-2 text-center">
                    <img  class="" src="http://lorempixel.com/140/140/food/0" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele"/>PLATO XYZ
                </div>
                <div id="ele2" class="plato col-md-2 text-center">
                    <img class="" src="http://lorempixel.com/140/140/food/1" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele2"/>PLATO XYZ
                </div>
                <div id="ele3" class="plato col-md-2 text-center">
                    <img class="" src="http://lorempixel.com/140/140/food/2" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele3"/>PLATO XYZ
                </div>
                <div id="ele4" class="plato col-md-2 text-center">
                    <img  class="" src="http://lorempixel.com/140/140/food/0" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele4"/>PLATO XYZ
                </div>
                <div id="ele5" class="plato col-md-2 text-center">
                    <img class="" src="http://lorempixel.com/140/140/food/1" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele5"/>PLATO XYZ
                </div>
                <div id="ele6" class="plato col-md-2 text-center">
                    <img class="" src="http://lorempixel.com/140/140/food/2" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele6"/>PLATO XYZ
                </div>
                <div id="ele4" class="plato col-md-2 text-center">
                    <img  class="" src="http://lorempixel.com/140/140/food/0" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele4"/>PLATO XYZ
                </div>
                <div id="ele5" class="plato col-md-2 text-center">
                    <img class="" src="http://lorempixel.com/140/140/food/1" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele5"/>PLATO XYZ
                </div>
                <div id="ele6" class="plato col-md-2 text-center">
                    <img class="" src="http://lorempixel.com/140/140/food/2" width="100" height="100">
                    <input type="checkbox" name="origen" value="ele6"/>PLATO XYZ
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-12">
        <a type="button" class="btn btn-primary pull-left" href="{{ url('gestionar/platos') }}">Regresar</a>
        <a type="button" class="btn btn-success pull-right"> <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Guardar detalles</a>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/gestionar-detalles.js') }}" type="text/javascript"></script>
@endsection
