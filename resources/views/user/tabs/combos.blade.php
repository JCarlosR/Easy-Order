@section('styles')
    <style>
        .plato{
            margin: 1.4em 0;
            height: 165px;
        }
        .img-thumbnail {
            width: 100px;
            height: 100px;
        }
    </style>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <h3>Combos</h3>
        <p>Desde este apartado usted podrá ordenar uno los combos destacados, o bien uno de los combos que hayan sido creados por usted.</p>
        @foreach( $combos as $combo )
            <div class="col-md-4 combo">
                <div class="panel-heading">
                    Combo {{ $combo->nombre }}
                    <span class="glyphicon glyphicon-star pull-right" aria-hidden="true" title="Combo destacado"></span>
                    {{ $combo->fecha }}
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
                                <td><img data-comboplato="{{ $plato->id }}" data-comboId="{{ $combo->id }}" src="{{asset('images/platos') }}/{{ $plato->imagen  }}.jpg" class="img-thumbnail combo"/></td>
                                <td>{{ $plato->nombre }}</td>
                                <td>{{ $plato->precio }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-block" data-combo="{{ $combo->id }}" data-name="{{ $combo->nombre }}">
                            <span class="glyphicon glyphicon-plus"></span> Solicitar
                        </button>
                    </div>
                </div>

            </div>

            @foreach($combo->comboplatos as $comboplato)
            <div class="modal fade in" data-comboPlatoId = "{{ $comboplato->plato_id }}{{ $combo->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detalles del plato</h4>
                            <p><strong></strong></p>
                        </div>
                        <div class="modal-body ">
                            @foreach($comboplato->comboplatodetalles as $comboplatodetalle)
                                <div class="plato text-center">
                                    <img  class="img-thumbnail img-rounded" src="{{ asset('images/detalles') }}/{{ $comboplatodetalle->detalle->imagen }}.jpg">
                                    <p class="detalle">{{ $comboplatodetalle->detalle->nombre }}</p>
                                    <p class="detalle">{{ $comboplatodetalle->detalle->precio }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button class="btn btn-danger form-control" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        @endforeach

    </div>
</div>

