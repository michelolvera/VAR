@extends('layouts.app')
@section('content')
<form method="POST" action="/city">
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
			<input name="shipping_cost" type="number" min="0" step="0.01" value="{{ old('shipping_cost') }}" required>
			<label for="shipping_cost">Costo de envió</label>
			@if ($errors->has('shipping_cost'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('shipping_cost') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<select id="state_id" name="state_id" value="{{ old('state_id') }}" required>
				@foreach ($states as $state)
				<option value="{{ $state->id }}">{{ $state->name }}</option>
				@endforeach
			</select>
			<label>País</label>
			@if ($errors->has('state_id'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('state_id') }}</span>
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
