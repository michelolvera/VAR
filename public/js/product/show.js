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
		car = [{slug:slug, cantidad:1}];
	}else{
		let encontrado = false;
		for (let i = 0; i < car.length; i++) {
			if(car[i].slug == slug){
				car[i].cantidad++;
				encontrado=true;
				break;
			}
		}
		if (!encontrado)
			car.push({slug:slug, cantidad:1});
	}
	Cookies.set('car', car);
	abrirCarrito();
}
