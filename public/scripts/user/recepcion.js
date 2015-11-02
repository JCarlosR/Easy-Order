var values = [];
function copiar() {
    $("input[name=origen]:checked").each(function(){
        values.push($(this).val());
    });
    for (var i = 0; i <= values.length; i++) {
        var ele = values[i];
        $('#'+ele).appendTo('#copia');
        $('#'+ele).attr('name', 'destinity');
    };
    values.length=0
}
function devolver() {
    $("input:checkbox:checked").each(function(){
        values.push($(this).val());
    });
    for (var i = 0; i <= values.length; i++) {
        var ele = values[i];
        $('#'+ele).appendTo('#original');
        $('#'+ele).attr('name', 'origen');
    };
    values.length=0
}