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
                                <input type="checkbox" value=" "/> {{ $entrada->nombre }}
                                <img src="{{ asset('images/platos') }}/{{ $entrada->imagen }}.jpg" data-id="{{ $entrada->id }}" class="img-thumbnail"/>
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
                                <input type="checkbox" value=" "/> {{ $segundo->nombre }}
                                <img src="{{ asset('images/platos') }}/{{ $segundo->imagen }}.jpg" data-id="{{ $segundo->id }}" class="img-thumbnail"/>
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
                                <input type="checkbox" value=" "/> {{ $postre->nombre }}
                                <img src="{{ asset('images/platos') }}/{{ $postre->imagen }}.jpg" data-id="{{ $postre->id }}" class="img-thumbnail"/>
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
                                <input type="checkbox" value=" "/> {{ $bebida->nombre }}
                                <img src="{{ asset('images/platos') }}/{{ $bebida->imagen}}.jpg" data-id="{{ $bebida->id }}" class="img-thumbnail"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary btn-lg pull-right" onclick="location.href='previsualizar'">
    Continuar <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
</button>

@section('extra-content')
    @parent
    @foreach( $platos as $plato )
        <div id="modalDetalles" class="modal fade in" data-plato="{{ $plato->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Elija los detalles</h4>
                    </div>
                    <form action="{{ url('#') }}" method="POST">
                        <div class="modal-body">
                            <div class="tab-pane fade in ">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    @foreach($plato->detalles as $detalle)
                                        <div class="col-md-3 plato text-center">
                                            <input type="checkbox" value=" "/> {{ $detalle->nombre }}
                                            <img src="{{ asset('images/detalles') }}/{{ $detalle->imagen}}.jpg" data-id="{{ $detalle->id }}" class="img-thumbnail"/>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
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
    @endforeach
@endsection