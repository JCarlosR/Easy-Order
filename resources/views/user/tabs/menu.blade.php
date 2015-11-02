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
                        @for ($i=0; $i<6; ++$i)
                        <div class="col-md-3 plato text-center">
                            <input type="checkbox" value="{{ $i }}"/> Plato XYZ
                            <img src="http://lorempixel.com/140/140/food/{{ $i }}" width="140" height="140"/>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <!-- Tab Segundos -->
            <div id="segundos" class="tab-pane fade in active">

            </div>
            <!-- Tab Postres -->
            <div id="postres" class="tab-pane fade in active">

            </div>
            <!-- Tab Bebidas -->
            <div id="bebidas" class="tab-pane fade in active">

            </div>
        </div>

        <button type="button" class="btn btn-primary btn-lg pull-right" onclick="location.href='previsualizar'">
            Continuar <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
        </button>
    </div>
</div>