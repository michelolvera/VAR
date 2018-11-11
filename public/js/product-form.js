$(document).ready(function() {
	$('#categorie_id').change(update_subcategorie());
	$('#slug').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
});

function update_subcategorie(){
	$.ajax({
		method: "get",
		url: "../subcategorie",
		data: {
			categorie_id: $('#categorie_id').val()
		},
		dataType: "json"
	})
	.done(function (jsonObject) {
		jsonObject.forEach(row => {
			$('#subcategorie_id').empty();
			$('#subcategorie_id').append('<option value="'+row['id']+'">'+row['name']+'</option>');
		});
	})
	.fail(function () {
		console.log('No se ha podido obtener la lista de subcategorias.');
	});
}