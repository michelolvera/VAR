@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($countries as $countrie)
		<tr>
			<td>{{ $countrie->name }}</td>
			<td>
				<a href="countrie/{{ $countrie->id }}/edit" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Editar</a>
				<a id="btn_eliminar" href="#" onclick="event.preventDefault(); delete_form('{{ $countrie->id }}');" class="red waves-effect waves-light btn" style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
				<form id="delete-form-{{ $countrie->id }}" action="countrie/{{ $countrie->id }}" method="POST" style="display: none;">
					@method('DELETE')
					@csrf
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="fixed-action-btn">
	<a href="countrie/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/floating-button.js') }}"></script>
<script src="{{ asset('js/countrie/delete.js') }}"></script>
@endsection