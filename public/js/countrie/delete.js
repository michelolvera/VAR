function delete_form(form_name){
	if(confirm("Esta acción no se puede deshacer y eliminara el país, además de sus estados y direcciones. ¿Desea continuar?")==true){
		document.getElementById('delete-form-'+form_name).submit();
	}
}