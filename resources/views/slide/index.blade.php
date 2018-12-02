@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Texto</th>
			<th>Enlace</th>
			<th>Imagen</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($slides as $slide)
		<tr>
			<td>{{ $slide->title }}</td>
			<td>{{ $slide->text }}</td>
			<td>{{ $slide->redirect }}</td>
			<td><img style="width: 200px;" src="img/{{ $slide->img_url }}"></td>
			<td>
				<a href="slide/{{ $slide->id }}/edit" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Editar</a>
				<a id="btn_eliminar" href="#" onclick="event.preventDefault(); delete_form('{{ $slide->id }}');" class="red waves-effect waves-light btn" style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
				<form id="delete-form-{{ $slide->id }}" action="slide/{{ $slide->id }}" method="POST" style="display: none;">
					@method('DELETE')
					@csrf
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="fixed-action-btn">
	<a href="slide/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/floating-button.js') }}"></script>
<script src="{{ asset('js/slide/delete.js') }}"></script>
@endsection