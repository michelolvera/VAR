@extends('layouts.app')
@section('content')
<form method="POST" action="/config">
	@method('PUT')
	@csrf
	<div class="row">
		<div class="input-field col s12 m6">
			<input name="store_name" type="text" value="{{ $config->store_name }}" required>
			<label for="store_name">Nombre de la tienda</label>
			@if ($errors->has('store_name'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('store_name') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<input name="carousel_products" type="number" min="5" value="{{ $config->carousel_products }}" required>
			<label for="carousel_products">Cantidad de productos en el carrusel</label>
			@if ($errors->has('carousel_products'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('carousel_products') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<input name="ramdom_products" type="number" min="6" value="{{ $config->ramdom_products }}" required>
			<label for="ramdom_products">Cantidad de productos aleatorios en página principal</label>
			@if ($errors->has('ramdom_products'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('ramdom_products') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<input name="products_per_page" type="number" min="10" value="{{ $config->products_per_page }}" required>
			<label for="products_per_page">Cantidad de productos por página</label>
			@if ($errors->has('products_per_page'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('products_per_page') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field file-field col s12 m6">
			<div class="btn">
				<span>Logo</span>
				<input name="store_logo" type="file" accept="image/*">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
			@if ($errors->has('store_logo'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('store_logo') }}</span>
			</div>
			@endif
		</div>
	</div>
	<div class="divider"></div>
	<div class="row">
		<h5 class="center-align">Ajustes avanzados</h5>
		<div class="input-field col s12 m6">
			<input name="nav_materialize_color" type="text" value="{{ $config->nav_materialize_color }}" required>
			<label for="nav_materialize_color">Clase de color de Materialize</label>
			@if ($errors->has('nav_materialize_color'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('nav_materialize_color') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<input name="side_background" type="text" value="{{ $config->side_background }}" required>
			<label for="side_background">Propiedad CSS backgroud</label>
			@if ($errors->has('side_background'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('side_background') }}</span>
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
				Guardar configuración
				<i class="material-icons right">send</i>
			</button>
		</div>
	</div>
</form>
@endsection
@section('extraimports')

@endsection
