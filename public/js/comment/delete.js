function delete_form(form_name) {
    if (confirm("Esta acción no se puede deshacer y eliminara el comentario, además de su respuesta en caso de existir. ¿Desea continuar?") == true) {
        document.getElementById('delete-form-' + form_name).submit();
    }
}

function change_form(id) {
    $("#response_form").attr('action', '/comment/replie/'+id);
}
