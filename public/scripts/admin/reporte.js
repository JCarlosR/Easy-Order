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
        var fechaIni = $('[name="fechaIni"]').val();
        var fechaFin = $('[name="fechaFin"]').val();
        if (fechaIni > fechaFin) {
            alert("Fechas incoherentes.");
            return false;
        } else
            return true;
    });
}






