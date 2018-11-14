@extends('layouts.app')
@section('content')
<form method="POST" action="../../product" enctype="multipart/form-data">
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
			<input id="description" type="text" name="description" value="{{ old('description') }}" required >
			<label for="description">Descripción</label>
			@if ($errors->has('description'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('description') }}</span>
			</div>
			@endif
		</div>
		<div class="col s12 m6">
			<label>Categoría</label>
			<select id="categorie_id" class="browser-default" name="categorie_id" value="{{ old('categorie_id') }}" required>
				@foreach($categories as $categorie)
				<option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
				@endforeach
			</select>
			@if ($errors->has('categorie_id'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('categorie_id') }}</span>
			</div>
			@endif
		</div>
		<div class="col s12 m6">
			<label>Subcategoría</label>
			<select id="subcategorie_id" class="browser-default" name="subcategorie_id" value="{{ old('subcategorie_id') }}" required>
			</select>
			@if ($errors->has('subcategorie_id'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('subcategorie_id') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m4">
			<input name="price" type="number" min="0" step="0.01" value="{{ old('price') }}" required>
			<label for="price">Precio (dos decimales)</label>
			@if ($errors->has('price'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('price') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m4">
			<input name="discount_percent" type="number" min="0" max="100" step="1" value="{{ old('discount_percent') }}" required>
			<label for="discount_percent">Porcentaje de descuento</label>
			@if ($errors->has('discount_percent'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('discount_percent') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m4">
			<input name="quantity" type="number" min="1" step="1" value="{{ old('quantity') }}" required>
			<label for="quantity">Cantidad en existencia</label>
			@if ($errors->has('quantity'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('quantity') }}</span>
			</div>
			@endif
		</div>
		<div class="col s12 m6">
			<label>Recorte de imagen</label>
			<select id="img_opt" class="browser-default" name="img_opt" value="{{ old('img_opt') }}" required>
				<option value="0">Rellenar</option>
				<option value="1">Expandir</option>
			</select>
			@if ($errors->has('img_opt'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('img_opt') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field file-field col s12 m6">
			<div class="btn">
				<span>Imágenes</span>
				<input name="pictures[]" value="{{ old('pictures') }}" type="file" accept="image/*" multiple required>
			</div>
			<div class="file-path-wrapper">
				<input name="picturesval" class="file-path validate" value="{{ old('picturesval') }}" type="text" placeholder="Selecciona una o más imágenes del producto">
			</div>
			@if ($errors->has('pictures'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('pictures') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<p>
				<label>
					<input id="pinned" name="pinned" type="checkbox" class="filled-in" />
					<span>Producto destacado</span>
				</label>
			</p>
			@if ($errors->has('pinned'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('pinned') }}</span>
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
				Registrar producto
				<i class="material-icons right">send</i>
			</button>
		</div>
		
	</div>
</form>
@endsection
@section('extraimports')
<script src="{{ asset('js/product-form.js') }}"></script>
@endsection