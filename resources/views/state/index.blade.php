@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>País</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($states as $state)
		<tr>
			<td>{{ $state->name }}</td>
			<td>{{ $state->countrie()->first()->name }}</td>
			<td>
				<a href="state/{{ $state->id }}/edit" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Editar</a>
				<a id="btn_eliminar" href="#" onclick="event.preventDefault(); delete_form('{{ $state->id }}');" class="red waves-effect waves-light btn" style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
				<form id="delete-form-{{ $state->id }}" action="state/{{ $state->id }}" method="POST" style="display: none;">
					@method('DELETE')
					@csrf
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="fixed-action-btn">
	<a href="state/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/categorie/index.js') }}"></script>
<script src="{{ asset('js/subcategorie/delete.js') }}"></script>
@endsection