@extends('layouts.app')
@section('content')
<form method="POST" action="/countrie/{{ $countrie->id }}">
	@method('PUT')
	@csrf
	<div class="row">
		<div class="input-field col s12 m12">
			<input name="name" type="text" value="{{ $countrie->name }}" required>
			<label for="name">Nombre</label>
			@if ($errors->has('name'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('name') }}</span>
			</div>
			@endif
		</div>
	</div>
	<div class="row center-align">
		<div class="col s6">
			<button type="button" class="btn waves-effect waves-light">
				Cancelar
				<i class="material-icons right">cancel</i>
			</button>
		</div>
		<div class="col s6">
			<button type="submit" class="btn waves-effect waves-light">
				Registrar país
				<i class="material-icons right">send</i>
			</button>
		</div>
	</div>
</form>
@endsection
@section('extraimports')
<script src="{{ asset('js/countrie/create.js') }}"></script>
@endsection