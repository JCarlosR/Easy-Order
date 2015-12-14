$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    $.datetimepicker.setLocale('es');
    $('.datatime').datetimepicker({
        lang:'ch',
        timepicker:false,
        format:'Y/m/d',
        formatDate:'Y/m/d'
    });

    $("#formulario").submit(function() {
        var fecha = $('[name="fecha"]').val();

        if (fecha.length <1) {
            alert("Seleccione un fecha.");
            return false;
        } else
            return true;
    });
}






