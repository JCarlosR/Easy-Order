<div class="panel panel-default">
    <div class="panel-body">
        <h3>Combos</h3>
        <p>Desde este apartado usted podrá ordenar uno los combos destacados, o bien uno de los combos que hayan sido creados por usted.</p>
        @for ($i=0; $i<6; ++$i)
        <div class="col-md-4 combo">
            <div class="panel-heading">
                Combo XYZ
                @if ($i<3)
                    <span class="glyphicon glyphicon-star pull-right" aria-hidden="true" title="Combo destacado"></span>
                @endif
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
                        <tr>
                            <td><img src="http://lorempixel.com/200/200/food/" width="160" height="160"/></td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                            <td><img src="http://lorempixel.com/200/200/food/{{ $i }}" width="160" height="160"/></td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                            <td><img src="http://lorempixel.com/200/200/food/{{ $i+1 }}" width="160" height="160"/></td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAddFO">
                        <span class="glyphicon glyphicon-plus"></span> Ver más
                    </button>
                </div>
            </div>

        </div>
        @endfor

    </div>
</div>