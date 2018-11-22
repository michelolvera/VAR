$(document).ready(function() {
	$('#categorie_id').change(function (event){
		update_subcategorie();
	});
	update_subcategorie();
});

function update_subcategorie(){
	$.ajax({
		method: "get",
		url: "/subcategorie",
		data: {
			categorie_id: $('#categorie_id').val()
		},
		dataType: "json"
	})
	.done(function (jsonObject) {
		$('#subcategorie_id').empty();
		jsonObject.forEach(row => {
			$('#subcategorie_id').append('<option value="'+row['id']+'">'+row['name']+'</option>');
		});
	})
	.fail(function () {
		console.log('No se ha podido obtener la lista de subcategorias.');
	});
}