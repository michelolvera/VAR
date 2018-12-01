@extends('layouts.app')
@section('content')
<form method="POST" action="/categorie/{{ $categorie->slug }}">
	@method('PUT')
	@csrf
	<div class="row">
		<div class="input-field col s12 m6">
			<input name="name" type="text" value="{{ $categorie->name }}" required>
			<label for="name">Nombre</label>
			@if ($errors->has('name'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('name') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<input name="css_color" type="text" value="{{ $categorie->css_color }}" required>
			<label for="css_color">Color CSS</label>
			@if ($errors->has('css_color'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('css_color') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<select id="icon" class="icon" name="icon" value="{{ $categorie->icon }}" required>
				<option id="beach_access" value="beach_access" data-icon="{{ asset('svg/material-icons/baseline-beach_access-24px.svg') }}">Paraguas</option>
				<option id="book" value="book" data-icon="{{ asset('svg/material-icons/baseline-book-24px.svg') }}">Libro</option>
				<option id="card_travel" value="card_travel" data-icon="{{ asset('svg/material-icons/baseline-card_travel-24px.svg') }}">Maleta</option>
				<option id="chrome_reader_mode" value="chrome_reader_mode" data-icon="{{ asset('svg/material-icons/baseline-chrome_reader_mode-24px.svg') }}">Agenda</option>
				<option id="collections_bookmark" value="collections_bookmark" data-icon="{{ asset('svg/material-icons/baseline-collections_bookmark-24px.svg') }}">Libros</option>
				<option id="commute" value="commute" data-icon="{{ asset('svg/material-icons/baseline-commute-24px.svg') }}">Transporte</option>
				<option id="description" value="description" data-icon="{{ asset('svg/material-icons/baseline-description-24px.svg') }}">Archivo</option>
				<option id="event_seat" value="event_seat" data-icon="{{ asset('svg/material-icons/baseline-event_seat-24px.svg') }}">Sillón</option>
				<option id="face" value="face" data-icon="{{ asset('svg/material-icons/baseline-face-24px.svg') }}">Persona</option>
				<option id="favorite" value="favorite" data-icon="{{ asset('svg/material-icons/baseline-favorite-24px.svg') }}">Corazón</option>
				<option id="flight_takeoff" value="flight_takeoff" data-icon="{{ asset('svg/material-icons/baseline-flight_takeoff-24px.svg') }}">Viaje</option>
				<option id="grade" value="grade" data-icon="{{ asset('svg/material-icons/baseline-grade-24px.svg') }}">Favorito</option>
				<option id="insert_emoticon" value="insert_emoticon" data-icon="{{ asset('svg/material-icons/baseline-insert_emoticon-24px.svg') }}">Feliz</option>
				<option id="insert_photo" value="insert_photo" data-icon="{{ asset('svg/material-icons/baseline-insert_photo-24px.svg') }}">Foto</option>
				<option id="library_books" value="library_books" data-icon="{{ asset('svg/material-icons/baseline-library_books-24px.svg') }}">Texto</option>
				<option id="record_voice_over" value="record_voice_over" data-icon="{{ asset('svg/material-icons/baseline-record_voice_over-24px.svg') }}">Comunicación</option>
				<option id="school" value="school" data-icon="{{ asset('svg/material-icons/baseline-school-24px.svg') }}">Educación</option>
				<option id="supervisor_account" value="supervisor_account" data-icon="{{ asset('svg/material-icons/baseline-supervisor_account-24px.svg') }}">Personas</option>
				<option id="theaters" value="theaters" data-icon="{{ asset('svg/material-icons/baseline-theaters-24px.svg') }}">Videos</option>
			</select>
			<label>Icono</label>
			@if ($errors->has('icon'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('icon') }}</span>
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
	document.getElementById('{{ $categorie->icon }}').setAttribute("selected", "");
</script>
@endsection
@section('extraimports')
<script src="{{ asset('js/categorie/create.js') }}"></script>
@endsection