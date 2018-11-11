$(document).ready(function() {
	$.ajax({
		method: "get",
		url: "../countrie",
		dataType: "json"
	})
	.done(function (jsonObject) {
		jsonObject.forEach(row => {
			$('#countrie_id').empty();
			$('#countrie_id').append('<option value="'+row['id']+(row['name']=="México" ? '" selected' : '"')+'>'+row['name']+'</option>');
		});
		$('#countrie_id').change(update_state());
	})
	.fail(function () {
		console.log('No se ha podido obtener la lista de paises.');
	});
});

function update_state(){
	$.ajax({
		method: "get",
		url: "../state/",
		data: {
			countrie_id: $('#countrie_id').val()
		},
		dataType: "json"
	})
	.done(function (jsonObject) {
		jsonObject.forEach(row => {
			$('#state_id').empty();
			$('#state_id').append('<option value="'+row['id']+(row['name']=="México" ? '" selected' : '"')+'>'+row['name']+'</option>');
		});
		$('select').formSelect();
	})
	.fail(function () {
		console.log('No se ha podido obtener la lista de estados.');
	});
}