$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    // Al hacer click en un plato, se permite mostrar sus detalles
    if($('#comboID').val() != ''){
        $('#btnGuardarCombo').prop('disabled', true);
    }
    else
    {
        $('#btnGuardarCombo').prop('disabled', false);
    }
}

