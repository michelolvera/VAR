$(document).ready(function() {
	$.ajax({
		method: "get",
		url: "/categorie",
		dataType: "json"
	})
	.done(function (jsonObject) {
		jsonObject.forEach(row => {
			$('#categories').append('<li><a href="../product/'+row['slug']+'"><i class="material-icons">'+row['icon']+'</i>'+row['name']+'</a></li>');
		});
	})
	.fail(function () {
		console.log('No se ha podido obtener la lista de categorias.');
	});
	$('.sidenav').sidenav();
	$('#btn_sidenav').click(function( event ) {
		event.preventDefault();
		let elem = document.getElementById("menu-side");
		let instance = M.Sidenav.getInstance(elem);
		instance.open();
	})
	$('#btn_shopping').click(function( event ) {
		event.preventDefault();
		let elem = document.getElementById("modal_shopping");
		let instance = M.Modal.getInstance(elem);
		instance.open();
	})
	
	$('.modal').modal();
});
