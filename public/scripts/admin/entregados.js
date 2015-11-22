$(document).on('ready', funcPrincipal);

function funcPrincipal() {

    $('.img-rounded').on('click', mostrarEditar);
    $('#cerrar').on('click',limpiarEtiquetas);
}

function mostrarEditar() {

    var idPlato = $(this).data('id');
    var idOrden = $(this).parent().data('id');
    var Plato = $(this).next().text();

    var datosEnviados =
    {
        'plato_id': idPlato,
        'orden_id': idOrden
    };

    $.ajax({
        type: 'POST',
        url: location.href,
        data: datosEnviados,
        dataType: 'json',
        encode: true
    }).done(function(datos){
        $('#myModal').find('strong').append(Plato);
        $.each(datos,function(index,element){
            $('#myModal').find('ul').append('<li><b>'+element.nombre+'</b> ( <i>'+element.descripcion+'</i>)</li>');
            $('#myModal').modal('show');
        });
    });
}

function limpiarEtiquetas(){
    $('#myModal').find('strong').text('');
    $('#myModal').find('li').remove();
    $('#myModal').modal('hide');
}


