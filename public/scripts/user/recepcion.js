$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    $("[data-id]").confirm({
        text: "Esta seguro de querer confirmar el pedido?",
        title: "Confirmación requerida",
        confirm: function(button) {
            var datosEnviados =
            {
                'orden_id': $(button).data('id'),
                'estado': 'confirmado'
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
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Si",
        cancelButton: "No",
        post: true,
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default",
        dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
    });
}