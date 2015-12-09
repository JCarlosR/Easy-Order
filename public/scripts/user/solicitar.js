$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    // Al hacer click en un plato, se permite mostrar sus detalles
    $('.img-thumbnail').next().on('click', mostrarDetalles);
    $('[data-combo]').on('click', enviarDatos);
}

function mostrarDetalles() {
    // Obtener el id del plato del data-id
    var idPlato = $(this).prev().data('id');
    var selector = '.modal[data-plato='+idPlato+']';
    var $modalDetalles = $(selector);
    // Mostrar modal
    $modalDetalles.modal('show');
}

function enviarDatos() {
    // Obtener el id del tipo
    var tipo = $('select[name=tipo_orden]').val();
    var combo_id = $(this).data('combo');

    //Hacer petición GET y pasarle los valores anteriores

    location.href = 'previsualizar/'+tipo+'/'+combo_id;



}