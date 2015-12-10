<div class="panel panel-default">
    <div class="panel-body">
        <h3>Combos</h3>
        <p>Desde este apartado usted podrá ordenar uno los combos destacados, o bien uno de los combos que hayan sido creados por usted.</p>
        @foreach( $combos as $combo )
        <div class="col-md-4 combo">
            <div class="panel-heading">
                Combo {{ $combo->nombre }}
                <span class="glyphicon glyphicon-star pull-right" aria-hidden="true" title="Combo destacado"></span>
            </div>
            <div class="panel panel-info">
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Plato</th>
                            <th class="col-md-6">Descripción</th>
                            <th class="col-md-3">Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($combo->platos as $plato)
                        <tr class="alto-det">
                            <td><img data-comboplato="{{ $plato->id }}" src="{{asset('images/platos') }}/{{ $plato->imagen  }}.jpg" class="img-thumbnail combo"/></td>
                            <td>{{ $plato->nombre }}</td>
                            <td>{{ $plato->precio }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary btn-block" data-combo="{{ $combo->id }}">
                        <span class="glyphicon glyphicon-plus"></span> Solicitar
                    </button>
                </div>
            </div>

        </div>
            @foreach($combo->platos as $plato)
            <div id="ModalDetalleCombo" class="modal fade in" data-comboPlatoId = "{{ $plato->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detalles del plato</h4>
                            <p><strong></strong></p>
                        </div>
                        <div class="modal-body">
                            <ul>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button class="btn btn-danger form-control" id="cerrar"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach

    </div>
</div>

