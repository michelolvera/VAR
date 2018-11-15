@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Icono</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $categorie)
		<tr>
			<td>{{ $categorie->name }}</td>
			<td><i class="material-icons">{{ $categorie->icon }}</i></td>
			<td>
				<a href="categorie/{{ $categorie->slug }}/edit" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Editar</a>
				<a id="btn_eliminar" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $categorie->slug }}').submit();" class="red waves-effect waves-light btn" style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
				<form id="delete-form-{{ $categorie->slug }}" action="categorie/{{ $categorie->slug }}" method="POST" style="display: none;">
					@method('DELETE')
					@csrf
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="fixed-action-btn">
	<a href="categorie/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/floating-button.js') }}"></script>
@endsection