$(document).ready(function(){
	$('.slider').slider();
	$('.fixed-action-btn').floatingActionButton();
	$('#delete_btn').click(function(event){
		event.preventDefault();
		if(confirm("Esta acción no se puede deshacer y eliminara el producto. ¿Desea continuar?")==true){
			document.getElementById('delete-form').submit();
		}
	})
});