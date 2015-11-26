@extends('app')


@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }} ">Home</a></li>
    <li class="dropdown">
        <a href="#">Platos y detalles <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('gestionar/platos') }}">Gestionar platos</a></li>
            <li><a href="{{ url('gestionar/detalles') }}">Gestionar detalles</a></li>
            <li><a href="{{ url('gestionar/platodetalles') }}">Asignar detalles</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="{{ url('asignar/menu') }}">Menú del día</a></li>
    <li class="dropdown">
        <a href="#">Pedidos <b class="caret"></b></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a href="{{ url('pedidos/pendientes') }}">Pedidos pendientes</a></li>
            <li><a href="{{ url('pedidos/entregados') }}">Pedidos entregados</a></li>
        </ul>
    </li>
    <li class="dropdown active"><a href="{{ url('gestionar/chefs') }}">Chefs</a></li>

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

        <div class="col-md-offset-3 col-md-6">
            <h1>Registro de chefs</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ url('chef/registrar') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="{{ old('nombres') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" name="dni" placeholder="DNI" value="{{ old('dni') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="sueldo">Sueldo</label>
                            <input type="number"  min="0" step='0.01' placeholder='0.00' class="form-control" name="sueldo" placeholder="Sueldo" value="{{ old('sueldo') }}" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="masculino" class="control-label">Género</label>
                            <div class="radio">
                                <label ><input type="radio" name="masculino" value="1" checked>Masculino</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="masculino" value="0">Femenino</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="activo" class="control-label">Estado</label>
                            <div class="radio">
                                <label><input type="radio" name="activo" value="1" checked>Activo</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="activo" value="0">Inactivo</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Guardar chef</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <!-- Tabla -->
            @if (count($chefs) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listado de Chefs
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Sueldo</th>
                            <th>Género</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            @foreach ($chefs as $chef)
                                <tr>
                                    <td class="table-text"><div>{{ $chef->nombres  }}</div></td>
                                    <td class="table-text"><div>{{ $chef->apellidos  }}</div></td>
                                    <td class="table-text"><div>{{ $chef->dni  }}</div></td>
                                    <td class="table-text"><div>{{ $chef->email  }}</div></td>
                                    <td class="table-text"><div>{{ $chef->direccion  }}</div></td>
                                    <td class="table-text"><div>{{ $chef->telefono  }}</div></td>
                                    <td class="table-text"><div>{{ $chef->sueldo  }}</div></td>
                                    <td class="table-text"><div> @if($chef->masculino==1 )Masculino @else Femenino @endif</div></td>
                                    <td class="table-text"><div> @if($chef->activo==1 )Activo @else Inactivo @endif</div></td>
                                    <td>
                                        <button type="submit" class="btn btn-success" data-id="{{ $chef->id }}" data-nombres="{{ $chef->nombres }}"
                                        data-apellidos="{{ $chef->apellidos }}" data-dni="{{ $chef->dni }}" data-email="{{ $chef->email }}" data-direccion="{{ $chef->direccion }}" data-telefono="{{ $chef->telefono }}"
                                        data-sueldo="{{ $chef->sueldo }}" data-masculino="{{ $chef->masculino }}" data-activo="{{ $chef->activo  }}">
                                            <i class="fa fa-pencil"></i>Editar
                                        </button>

                                        <button type="submit" class="btn btn-danger" data-eliminar  data-semidelete="{{ $chef->id }}" data-nombres="{{ $chef->nombres }}">
                                                <i class="fa fa-trash"></i>Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('extra-content')
    <div id="modalEditar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar detalle</h4>
                </div>
                <form action="{{ url('chef/modificar') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />

                        <div class="form-group">
                            <label for="nombres">Nuevos nombres</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Nombres" required/>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Nuevos Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required/>
                        </div>
                        <div class="form-group">
                            <label for="dni">Nuevo DNI</label>
                            <input type="text" class="form-control" name="dni" placeholder="DNI" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Nuevo Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Nueva Dirección</label>
                            <input type="text" class="form-control" name="direccion" placeholder="Dirección" required/>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Nuevo Teléfono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono" required/>
                        </div>
                        <div class="form-group">
                            <label for="sueldo">Nuevo Sueldo</label>
                            <input type="number" min="0" step='0.01' placeholder='0.00' class="form-control" name="sueldo" placeholder="Sueldo" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="masculino" class="control-label">Género</label>
                            <div class="radio">
                                <label ><input type="radio" name="masculino" value="1">Masculino</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="masculino" value="0">Femenino</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="activo" class="control-label">Estado</label>
                            <div class="radio">
                                <label><input type="radio" name="activo" value="1">Activo</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="activo" value="0">Inactivo</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Guardar Chef</button>
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
                    <h4 class="modal-title">Eliminar Chef</h4>
                </div>
                <form action="{{ url('chef/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombreEliminar">¿Desea cambiar a estado inactivo el siguiente Chef ?</label>
                            <input type="text" readonly class="form-control" name="nombreEliminar"/>
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
    <script src="{{ asset('scripts/admin/gestionar-chefs.js') }}"></script>
@endsection
