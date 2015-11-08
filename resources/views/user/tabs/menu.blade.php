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
                                <input type="checkbox" value=" "/> {{$entrada->nombre}}
                                <img src="{{ asset('images/platos') }}/{{ $entrada->imagen}}.jpg"/">
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
                                <input type="checkbox" value=" "/> {{$segundo->nombre}}
                                <img src="{{ asset('images/platos') }}/{{ $segundo->imagen}}.jpg"/>
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
                                <input type="checkbox" value=" "/> {{$postre->nombre}}
                                <img src="{{ asset('images/platos') }}/{{ $postre->imagen}}.jpg"/>
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
                                <input type="checkbox" value=" "/> {{$bebida->nombre}}
                                <img src="{{ asset('images/platos') }}/{{ $bebida->imagen}}.jpg"/>
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
    <div id="myModal" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalles del plato</h4>
                </div>
                <div class="modal-body">
                    <img src="" alt="">

                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger form-control" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection