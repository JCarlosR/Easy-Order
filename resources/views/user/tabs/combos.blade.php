<div class="panel panel-default">
    <div class="panel-body">
        <h3>Combos</h3>
        <p>Desde este apartado usted podrá ordenar uno los combos destacados, o bien uno de los combos que hayan sido creados por usted.</p>
        @foreach( $combos as $combo )
        <div class="col-md-4 combo">
            <div class="panel-heading">
                Combo XYZ
                <span class="glyphicon glyphicon-star pull-right" aria-hidden="true" title="Combo destacado"></span>
            </div>
            <div class="panel panel-info">
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Plato</th>
                            <th class="col-md-9">Descripción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($combo->platos as $plato)
                        <tr class="alto-det">
                            <td><img src="{{asset('images/platos') }}/{{ $plato->imagen  }}.jpg" class="img-thumbnail"/></td>
                            <td>{{ $plato->nombre }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAddFO" onclick="location.href='previsualizar'"
                        <span class="glyphicon glyphicon-plus"></span> Ver más
                    </button>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>

