@extends('app')

@section('styles')
    <style>
        .img-thumbnail {
            width: 100px;
            height: 100px;
        }

        .modal-body {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('menu-options')
    <li class="dropdown"><a href="{{ url('bienvenido/usuario') }}">Home</a></li>
    <li class="dropdown"><a href="{{ url('solicitar') }}">Solicitar pedido</a></li>
    <li class="dropdown"><a href="{{ url('anteriores') }}">Pedidos anteriores</a></li>
    <li class="dropdown active"><a href="{{ url('recepcion') }}">Confirmar recepción</a></li>
    <li class="dropdown"><a href="{{ url('salir') }}">Salir</a></li>
@endsection

@section('content')
    <div class="col-md-offset-3 col-md-6">
        <header>
            <h1 class="text-center">Confirmación de pedidos</h1>
            <p>Por favor confirme aquellos pedidos que ha recibido correctamente.</p>
        </header>

        <div class="panel-group" id="accordion">
            @foreach($ordenes as $orden)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ $orden->id }}">
                                <span class="glyphicon glyphicon-cutlery"></span> Orden {{ $orden->id }} - {{ $orden->combo_name or 'Elección Común' }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne{{ $orden->id }}" class="panel-collapse collapse in">
                        <div class="panel-body">
                            @foreach($orden->platos as $plato)
                                <div class="col-md-3">
                                    <img src="{{ asset('images/platos') }}/{{ $plato->imagen }}.jpg" class="img-thumbnail">
                                    <p class="text-center">{{ $plato->nombre }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <h3 align="center"><span class="label label-{{ $orden->estadodesc->color }}">{{ $orden->estadodesc->descripcion }}</span></h3>
                            <br>
                            @if($orden->estadodesc->nombre == 'terminado')
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-id="{{ $orden->id }}">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirmar pedido
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@section('extra-content')
    <div id="modalDetalle" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Detalles del plato</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/1" width="60" height="60">
                            <label>Sin menestra</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/2" width="80" height="80">
                            <label>Con papa frita</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/3" width="80" height="80">
                            <label>Con papa sanchocada</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/4" width="80" height="80">
                            <label>Una presa adicional</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/3" width="80" height="80">
                            <label>Con papa sanchocada</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/4" width="80" height="80">
                            <label>Una presa adicional</label>
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/140/140/food/3" width="80" height="80">
                            <label>Con papa sanchocada</label>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger move-right" data-dismiss="modal"><span
                                class="glyphicon glyphicon-thumbs-down"></span> Cancelar
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/user/jquery.confirm.min.js') }}"></script>
    <script src="{{ asset('scripts/user/recepcion.js') }}"></script>
@endsection