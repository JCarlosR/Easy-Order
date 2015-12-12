$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    // Al hacer click en un plato, se permite mostrar sus detalles
    $('.img-thumbnail').next().on('click', mostrarDetalles);
    $('.combo').on('click', mostrarDetallesCombo);
    $('[data-combo]').on('click', enviarDatos);
}

function mostrarDetalles() {
    // Obtener el id del plato desde el atributo data-id
    var idPlato = $(this).prev().data('id');
    var selector = '.modal[data-plato='+idPlato+']';
    var $modalDetalles = $(selector);
    // Mostrar modal
    $modalDetalles.modal('show');
}

function mostrarDetallesCombo() {
    // Obtener el id del combo desde e atributo data-comboplato
    var idComboPlato = $(this).data('comboplato');
    var idCombo = $(this).data('comboid');
    var selector = '.modal[data-comboPlatoId='+idComboPlato+idCombo+']';
    var $modalDetalles = $(selector);
    // Mostrar modal
    $modalDetalles.modal('show');
}

function enviarDatos() {
    // Obtener el tipo de orden y el id del combo elegido
    var tipo = $('select[name=tipo_orden]').val();
    var combo_id = $(this).data('combo');
    var combo_name =$(this).data('name');

    //Hacer petición GET y pasarle los valores anteriores
    location.href = 'previsualizar/'+tipo+'/'+combo_id+'/'+combo_name;
}