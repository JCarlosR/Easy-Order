<div class="panel panel-default">
    <div class="panel-body">
        <h3>Personalizar menú</h3>
        <p>Desde este apartado usted podrá personalizar los platos y detalles que desea ordenar.</p>

        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#entrada">Entrada/Sopas</a></li>
            <li><a data-toggle="tab" href="#segundos">Segundos</a></li>
            <li><a data-toggle="tab" href="#postres">Postres</a></li>
            <li><a data-toggle="tab" href="#bebidas">Bebidas</a></li>
        </ul>

        <div class="tab-content">
            <!-- Tab Entrada/Sopas -->
            <div id="entrada" class="tab-pane fade in active">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach( $entradas as $entrada)
                            <div class="col-md-3 text-center plato">
                                <input type="checkbox" value="{{ $entrada->id }}" name="entradas[]"/> {{ $entrada->nombre }}
                                <div class="vista">
                                    <img src="{{ asset('images/platos') }}/{{ $entrada->imagen }}.jpg" data-id="{{ $entrada->id }}" class="img-thumbnail"/>
                                    <div class="mascara">
                                        <h2>{{ $entrada->nombre }}</h2>
                                        <p>{{ $entrada->descripcion }}</p>
                                        <label class="informacion"> S/.{{ $entrada->precio }}</label>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tab Segundos -->
            <div id="segundos" class="tab-pane fade in">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach( $segundos   as $segundo)
                            <div class="col-md-3 plato text-center">
                                <input type="checkbox" value="{{ $segundo->id }}" name="segundos[]"/> {{ $segundo->nombre }}
                                <div class="vista">
                                    <img src="{{ asset('images/platos') }}/{{ $segundo->imagen }}.jpg" data-id="{{ $segundo->id }}" class="img-thumbnail"/>
                                    <div class="mascara">
                                        <h2>{{ $segundo->nombre }}</h2>
                                        <p>{{ $segundo->descripcion }}</p>
                                        <label class="informacion"> S/.{{ $segundo->precio }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tab Postres -->
            <div id="postres" class="tab-pane fade in">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach( $postres   as $postre)
                            <div class="col-md-3 plato text-center">
                                <input type="checkbox" value="{{ $postre->id }}" name="postres[]"/> {{ $postre->nombre }}
                                <div class="vista">
                                    <img src="{{ asset('images/platos') }}/{{ $postre->imagen }}.jpg" data-id="{{ $postre->id }}" class="img-thumbnail"/>
                                    <div class="mascara">
                                        <h2>{{ $postre->nombre }}</h2>
                                        <p>{{ $postre->descripcion }}</p>
                                        <label class="informacion"> S/.{{ $postre->precio }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tab Bebidas -->
            <div id="bebidas" class="tab-pane fade in ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach( $bebidas   as $bebida)
                            <div class="col-md-3 plato text-center">
                                <input type="checkbox" value="{{ $bebida->id }}" name="bebidas[]"/> {{ $bebida->nombre }}
                                <div class="vista">
                                    <img src="{{ asset('images/platos') }}/{{ $bebida->imagen}}.jpg" data-id="{{ $bebida->id }}" class="img-thumbnail"/>
                                    <div class="mascara detail">
                                        <h2>{{ $bebida->nombre }}</h2>
                                        <p>{{ $bebida->descripcion }}</p>
                                        <label class="informacion"> S/.{{ $bebida->precio }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary btn-lg pull-right">
    Continuar <span class="glyphicon glyphicon-hand-right"></span>
</button>

@foreach( $platos as $plato )
    <div class="modal fade in" data-plato="{{ $plato->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Seleccione los detalles</h4>
                </div>
                    <div class="modal-body">
                            <div class="row-fluid">
                            @foreach($plato->detalles as $detalle)
                                <div class="col-md-4 plato text-center">
                                    <input type="checkbox" value="{{ $detalle->id }}" name="detalles{{ $plato->id }}[]"/> {{ $detalle->nombre }}

                                    <div class="vista">
                                        <img src="{{ asset('images/detalles') }}/{{ $detalle->imagen}}.jpg" data-id="{{ $detalle->id }}" class="img-thumbnail"/>
                                        <div class="mascara">
                                            <h2>{{ $detalle->nombre }}</h2>
                                            <p>{{ $detalle->descripcion }}</p>
                                            <label class="informacion"> S/.{{ $detalle->precio }}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-right">
                            <button class="btn btn-success" data-dismiss="modal">
                                <span class="glyphicon glyphicon-cutlery"></span> Aceptar
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endforeach