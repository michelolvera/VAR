@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
	<thead>
		<tr>
            <th>Nombre</th>
            <th>Costo de envió</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($cities as $city)
		<tr>
            <td>{{ $city->name }}</td>
            <td>${{ $city->shipping_cost }}</td>
			<td>
				<a href="city/{{ $city->id }}/edit" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Editar</a>
				<a id="btn_eliminar" href="#" onclick="event.preventDefault(); delete_form('{{ $city->id }}');" class="red waves-effect waves-light btn" style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
				<form id="delete-form-{{ $city->id }}" action="city/{{ $city->id }}" method="POST" style="display: none;">
					@method('DELETE')
					@csrf
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="fixed-action-btn">
	<a href="/city/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/floating-button.js') }}"></script>
<script src="{{ asset('js/city/delete.js') }}"></script>
@endsection
