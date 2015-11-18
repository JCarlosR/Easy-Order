$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    // Al hacer click en un plato, se permite mostrar sus detalles
    $('.img-thumbnail').next().on('click', mostrarDetalles);
}

function mostrarDetalles() {
    // Obtener el id del plato del data-id
    var idPlato = $(this).prev().data('id');
    var selector = '.modal[data-plato='+idPlato+']';
    var $modalDetalles = $(selector);
    // Mostrar modal
    $modalDetalles.modal('show');
}