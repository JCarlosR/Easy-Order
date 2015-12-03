$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    // Seleccionar elementos de interfaz
    $modalEditar = $('#modalEditar');
    $modalEliminar = $('#modalEliminar');
    // Al hacer click en un detalle, se permite editarlo
    $('[data-id]').on('click', mostrarEditar);
    $('[data-eliminar]').on('click', mostrarEliminar);

}

// Referencia a elementos de interfaz
var $modalEditar;
var $modalEliminar;

function mostrarEditar() {
    // Cargar datos previos
    var idEditar = $(this).data('id');
    $modalEditar.find('[name="id"]').val(idEditar);

    var nombres = $(this).data('nombres');
    $modalEditar.find('[name="nombres"]').val(nombres);

    var apellidos = $(this).data('apellidos');
    $modalEditar.find('[name="apellidos"]').val(apellidos);

    var dni = $(this).data('dni');
    $modalEditar.find('[name="dni"]').val(dni);

    var email = $(this).data('email');
    alert(email);
    $modalEditar.find('[name="email"]').val(email);

    var direccion = $(this).data('direccion');
    $modalEditar.find('[name="direccion"]').val(direccion);

    var sueldo = $(this).data('sueldo');
    $modalEditar.find('[name="sueldo"]').val(sueldo);

    var telefono = $(this).data('telefono');
    $modalEditar.find('[name="telefono"]').val(telefono);

    if( $(this).data('masculino')== 1 )
        $modalEditar.find('[name="masculino"][value=1]').prop('checked', true);
    else
        $modalEditar.find('[name="masculino"][value=0]').prop('checked', true);

    if( $(this).data('activo')== 1 )
        $modalEditar.find('[name="activo"][value=1]').prop('checked', true);
    else
        $modalEditar.find('[name="activo"][value=0]').prop('checked', true);

    // Mostrar modal
    $modalEditar.modal('show');
}

function mostrarEliminar() {
    // Cargar datos previos
    var idEditar = $(this).data('semidelete');
    $modalEliminar.find('[name="id"]').val(idEditar);

    var nombres = $(this).data('nombres');
    $modalEliminar.find('[name="nombreEliminar"]').val(nombres);

    // Mostrar modal
    $modalEliminar.modal('show');
}