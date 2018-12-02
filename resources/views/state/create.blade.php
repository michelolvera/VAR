@extends('layouts.app')
@section('content')
<form method="POST" action="/state">
	@csrf
	<div class="row">
		<div class="input-field col s12 m6">
			<input name="name" type="text" value="{{ old('name') }}" required>
			<label for="name">Nombre</label>
			@if ($errors->has('name'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('name') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<select id="countrie_id" name="countrie_id" value="{{ old('countrie_id') }}" required>
				@foreach ($countries as $countrie)
				<option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
				@endforeach
			</select>
			<label>País</label>
			@if ($errors->has('countrie_id'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('countrie_id') }}</span>
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
				Registrar estado
				<i class="material-icons right">send</i>
			</button>
		</div>
	</div>
</form>
@endsection
@section('extraimports')
<script src="{{ asset('js/categorie/create.js') }}"></script>
@endsection