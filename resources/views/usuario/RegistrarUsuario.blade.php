@extends('layouts.app')

@section('titulo','Registro')

@section('contenido')
<div class="row">
	<form action="/usuario" method="POST" class="col s12">
		@csrf
		<div class="row">
			<div class="input-field col s12">
				<input id="in_nombre" name="nombre" type="text" class="validate">
				<label for="in_nombre">Nombre</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input id="in_apellido_paterno" name="apellido_paterno" type="text" class="validate">
				<label for="in_apellido_materno">Apellido Paterno</label>
			</div>
			<div class="input-field col s6">
				<input id="in_apellido_materno" name="apellido_materno" type="text" class="validate">
				<label for="in_apellido_materno">Apellido Materno</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input id="in_email" name="email" type="email" class="validate">
				<label for="in_email">Correo</label>
			</div>
			<div class="input-field col s6">
				<input id="in_password" name="password" type="password" class="validate">
				<label for="in_password">Contraseña</label>
			</div>
		</div>
		<div class="row">
			<button type="submit" class="waves-effect waves-light btn" style="float: right;">Registrar</button>
		</div>
	</form>
</div>
@endsection