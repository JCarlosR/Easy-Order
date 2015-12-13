@extends('app')

@section('styles')
    <style>
        .plato {
            margin: 1.4em 0;
            height: 165px;
        }

        .img-thumbnail {
            width: 100px;
            height: 100px;
        }

        .detalle{
            line-height: 100%;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
    <li class="dropdown active">
        <a href="#">Gestionar <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('gestionar/platos') }}">Gestionar platos</a></li>
            <li><a href="{{ url('gestionar/detalles') }}">Gestionar detalles</a></li>
            <li><a href="{{ url('gestionar/platodetalles') }}">Asignar detalles</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('asignar/menu') }}">Menú</a></li>
    <li class="dropdown">
        <a href="#">Pedidos <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
            <li><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('gestionar/chefs') }}">Chefs</a></li>
    <li class="dropdown">
        <a href="#">Reporte <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('reportes/ordenes') }}">Reportes Ordenes</a></li>
            <li><a href="{{ url('#') }}">Otros</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <div class="container">

        @if($errors->count() > 0)
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>Lo sentimos!</strong> Por favor revise los siguientes errores.
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if(isset($notif))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        <strong>Éxito! </strong> {{ $notif }}
                    </div>
                </div>
            </div>
        @endif

        <div class="col-md-6">
            <h1>Gestionar platos</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($platos as $plato)
                        <div class="plato col-md-3 text-center">
                            <img data-id="{{ $plato->id }}" data-precio="{{$plato->precio}}" class="img-thumbnail" title="{{ $plato->descripcion }}"
                                 src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg">

                            <p class="detalle">{{ $plato->nombre }}</p>
                            <span class="glyphicon glyphicon-remove" style="color:red" data-eliminar></span>

                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                    {{--{!! $detalles->render() !!}--}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>Nuevo plato</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ url('plato/registrar') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del plato" value="{{ old('nombre') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Ingrese descripción del plato" value="{{ old('descripcion') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Tipo</label>
                            <select name="tipo_id" class="form-control">
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="precio" placeholder="Ingrese precio del plato" value="{{ old('precio') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" name="imagen" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Guardar plato</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <a type="button" class="btn btn-primary pull-left" href="{{ url('/') }}">Regresar</a>

@endsection

@section('extra-content')
    <div id="modalEditar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar plato</h4>
                </div>
                <form action="{{ url('plato/modificar') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombre">Nuevo nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nuevo nombre del detalle" required/>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Nueva descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Nueva descripción del detalle" required/>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Tipo</label>
                            <select name="tipo_id" class="form-control">
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="precio">Nuevo precio</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="precio" placeholder="Nuevo precio del detalle" required/>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Nueva imagen (cargar solo si desea modificar)</label>
                            <input type="file" class="form-control" name="imagen" accept="image/*">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Guardar plato</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalEliminar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar plato</h4>
                </div>
                <form action="{{ url('plato/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombre">¿Desea eliminar el siguiente plato?</label>
                            <input type="text" readonly class="form-control" name="nombre"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Cancelar</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/admin/gestionar-detalles.js') }}"></script>
@endsection

