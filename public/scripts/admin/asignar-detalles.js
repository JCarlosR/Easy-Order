var values = [];
var plato = $('[data-plato]').data('plato');

function asignar() {
    $("input[name=origen]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        var datosEnviados =
        {
            'plato_id': $(this).val(),
            'asignar': 1
        };

        $.ajax({
            type: 'POST',
            url: location.href,
            data: datosEnviados,
            dataType: 'json',
            encode: true
        }).done(function(datos){
            if(datos.exito){
                _this.attr('name','destino');
                _this.parent().appendTo('#asignados');
            }
            else
                alert('No se pudo realizar la asignación.');
        });
    });
    values.length=0;

}
function devolver() {
    $("input[name=destino]:checked").each(function(){
        values.push($(this));
    });
    $(values).each( function(i,element) {
        var _this = $(this);
        var datosEnviados =
        {
            'detalle_id': $(this).val(),
            'asignar': 0
        };

        $.ajax({
            type: 'POST',
            url: location.href,
            data: datosEnviados,
            dataType: 'json',
            encode: true
        }).done(function(datos){
            if(datos.exito){
                _this.attr('name','origen');
                _this.parent().appendTo('#noAsignados');
            }
            else
                alert('No se pudo realizar la eliminación.');
        });

    });
    values.length=0;
}