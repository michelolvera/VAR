@extends('layouts.app')
@section('content')
<form method="POST" action="/subcategorie">
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
			<select id="categorie_id" class="icon" name="categorie_id" value="{{ old('categorie_id') }}" required>
				@foreach ($categories as $categorie)
				<option value="{{ $categorie->id }}" data-icon="{{ asset('svg/material-icons/baseline-'.$categorie->icon.'-24px.svg') }}">{{ $categorie->name }}</option>
				@endforeach
			</select>
			<label>Subcategoría</label>
			@if ($errors->has('categorie_id'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('categorie_id') }}</span>
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
				Registrar categoría
				<i class="material-icons right">send</i>
			</button>
		</div>
	</div>
</form>
@endsection
@section('extraimports')
<script src="{{ asset('js/categorie/create.js') }}"></script>
@endsection