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

function agregarCarrito(slug){
	let car = Cookies.getJSON('car');
	if(car == undefined){
		car = new Array();
	}
	car.push(slug);
	Cookies.set('car', car);
	let elem = document.getElementById("modal_shopping");
	let instance = M.Modal.getInstance(elem);
	instance.open();
}