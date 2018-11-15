@extends('layouts.app')
@section('content')
<form method="POST" action="/subcategorie">
	@csrf
	<div class="row">
		<div class="input-field col s12 m6">
			<input name="name" type="text" value="{{ $subcategorie->name }}" required>
			<label for="name">Nombre</label>
			@if ($errors->has('name'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('name') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<select id="categorie_id" class="icon" name="categorie_id" value="{{ $subcategorie->categorie_id }}" required>
				@foreach ($categories as $categorie)
				<option id="option-{{ $categorie->id }}" value="{{ $categorie->id }}" data-icon="{{ asset('svg/material-icons/baseline-'.$categorie->icon.'-24px.svg') }}">{{ $categorie->name }}</option>
				@endforeach
			</select>
			<label>Categoría</label>
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
<script type="text/javascript">
	document.getElementById('option-{{ $subcategorie->categorie_id }}').setAttribute("selected", "");
</script>
@endsection
@section('extraimports')
<script src="{{ asset('js/floating-button.js') }}"></script>
<script src="{{ asset('js/categorie/create.js') }}"></script>
@endsection