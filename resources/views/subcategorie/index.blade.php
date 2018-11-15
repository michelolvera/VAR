@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Categoría</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($subcategories as $subcategorie)
		<tr>
			<td>{{ $subcategorie->name }}</td>
			<td>{{ $subcategorie->categorie()->first()->name }}</td>
			<td>
				<a href="subcategorie/{{ $subcategorie->slug }}/edit" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Editar</a>
				<a id="btn_eliminar" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $subcategorie->slug }}').submit();" class="red waves-effect waves-light btn" style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
				<form id="delete-form-{{ $subcategorie->slug }}" action="subcategorie/{{ $subcategorie->slug }}" method="POST" style="display: none;">
					@method('DELETE')
					@csrf
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="fixed-action-btn">
	<a href="subcategorie/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/categorie/index.js') }}"></script>
@endsection