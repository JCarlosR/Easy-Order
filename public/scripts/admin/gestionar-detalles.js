$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    // Seleccionar elementos de interfaz
    $modalEditar = $('#modalEditar');
    $modalEliminar = $('#modalEliminar');
    // Al hacer click en un detalle, se permite editarlo
    $('.img-thumbnail').on('click', mostrarEditar);
    $('[data-eliminar]').on('click', mostrarEliminar);

}

// Referencia a elementos de interfaz
var $modalEditar;
var $modalEliminar;

function mostrarEditar() {
    // Cargar datos previos
    var idEditar = $(this).data('id');
    $modalEditar.find('[name="id"]').val(idEditar);

    var nombre = $(this).next().text();
    $modalEditar.find('[name="nombre"]').val(nombre);

    var descripcion = $(this).attr('title');
    $modalEditar.find('[name="descripcion"]').val(descripcion);

    var precio = $(this).data('precio');
    $modalEditar.find('[name="precio"]').val(precio);

    // Mostrar modal
    $modalEditar.modal('show');
}

function mostrarEliminar() {
    // Cargar datos previos
    var idEditar = $(this).prev().prev().data('id');
    $modalEliminar.find('[name="id"]').val(idEditar);

    var nombre = $(this).prev().text();
    $modalEliminar.find('[name="nombre"]').val(nombre);

    // Mostrar modal
    $modalEliminar.modal('show');
}
