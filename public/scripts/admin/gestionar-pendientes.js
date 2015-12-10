$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    $(".btn").on('click',modificarEstado);
}

function modificarEstado(){
    var ordenid = $(this).data('id');
    var estado = $(this).data('name');
    var datosEnviados =
    {
        'estado': estado
    };

    $.ajax({
        type: 'POST',
        url: location.href,
        data: datosEnviados,
        dataType: 'json',
        encode: true
    }).done(function(datos){
        location.reload();
    });
}