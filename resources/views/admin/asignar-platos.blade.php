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
    <h1>Asignar platos del día</h1>
    <div class="col-md-12">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Platos para seleccionar</div>
                <div id="original" class="panel-body">
                    <div id="ele" class="plato col-md-3 text-center">
                        <img  class="img-rounded" src="http://lorempixel.com/140/140/food/0" width="100" height="100">
                        <input type="checkbox" name="origen" value="ele"/>PLATO XYZ
                    </div>
                    <div id="ele2" class="plato col-md-3 text-center">
                        <img class="img-rounded" src="http://lorempixel.com/140/140/food/1" width="100" height="100">
                        <input type="checkbox" name="origen" value="ele2"/>PLATO XYZ
                    </div>
                    <div id="ele3" class="plato col-md-3 text-center">
                        <img class="img-rounded" src="http://lorempixel.com/140/140/food/2" width="100" height="100">
                        <input type="checkbox" name="origen" value="ele3"/>PLATO XYZ
                    </div>
                    <div id="ele4" class="plato col-md-3 text-center">
                        <img  class="img-rounded" src="http://lorempixel.com/140/140/food/0" width="100" height="100">
                        <input type="checkbox" name="origen" value="ele4"/>PLATO XYZ
                    </div>
                    <div id="ele5" class="plato col-md-3 text-center">
                        <img class="img-rounded" src="http://lorempixel.com/140/140/food/1" width="100" height="100">
                        <input type="checkbox" name="origen" value="ele5"/>PLATO XYZ
                    </div>
                    <div id="ele6" class="plato col-md-3 text-center">
                        <img class="img-rounded" src="http://lorempixel.com/140/140/food/2" width="100" height="100">
                        <input type="checkbox" name="origen" value="ele6"/>PLATO XYZ
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="">
                <button type="button" class="btn btn-info margen btn-block" onclick="copiar();">Trasladar <span class="glyphicon glyphicon-forward" ></span> </button>
                <button type="button" class="btn btn-warning btn-block" onclick="devolver();"> <span class="glyphicon glyphicon-backward" ></span> Devolver</button>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Platos seleccionados</div>
                <div id="copia" class="panel-body" >

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-md-12">
    <a type="button" class="btn btn-primary pull-left" href="bienvenido/welcome">Regresar</a>

    <a type="button" class="btn btn-success pull-right " href="{{  url('gestionar/detalles')  }}">Asignar detalles</a>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/gestionar-platos.js') }}"></script>
@endsection
