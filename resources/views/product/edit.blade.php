@extends('layouts.app')
@section('content')
<form method="POST" action="/product/{{ $product->slug }}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row">
		<div class="input-field col s12 m6">
			<input name="name" type="text" value="{{ $product->name }}" required>
			<label for="name">Nombre</label>
			@if ($errors->has('name'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('name') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<textarea id="description" class="materialize-textarea" name="description" required >{{ $product->description }}</textarea>
			<label for="description">Descripción</label>
			@if ($errors->has('description'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('description') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m4">
			<input name="price" type="number" min="0" step="0.01" value="{{ $product->price }}" required>
			<label for="price">Precio (dos decimales)</label>
			@if ($errors->has('price'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('price') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m4">
			<input name="discount_percent" type="number" min="0" max="100" step="1" value="{{ $product->discount_percent }}" required>
			<label for="discount_percent">Porcentaje de descuento</label>
			@if ($errors->has('discount_percent'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('discount_percent') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m4">
			<input name="quantity" type="number" min="1" step="1" value="{{ $product->quantity }}" required>
			<label for="quantity">Cantidad en existencia</label>
			@if ($errors->has('quantity'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('quantity') }}</span>
			</div>
			@endif
		</div>
		<div class="col s12 m6">
			<label>Recorte de imagen</label>
			<select id="img_opt" class="browser-default" name="img_opt" value="{{ old('img_opt') }}">
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
				<input name="pictures[]" value="{{ old('pictures') }}" type="file" accept="image/*" multiple>
			</div>
			<div class="file-path-wrapper">
				<input name="picturesval" class="file-path validate" value="{{ old('picturesval') }}" type="text" placeholder="Selecciona una o más nuevas imágenes del producto">
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
					<input id="pinned" name="pinned" type="checkbox" class="filled-in" @if($product->pinned) checked="checked" @endif/>
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
	@if ($product->product_img_names()->count() > 0)
	<div class="row">
		@foreach ($product->product_img_names()->get() as $img)
		<div class="col s12 m6 l4 xl3 center-align">
			<p>
				<label>
					<input name="{{ $img->name }}" type="checkbox" class="filled-in" />
					<span>Eliminar</span>
				</label>
			</p>
			<img class="img-mini" src="{{ asset('img/crop'.$img->name) }}">
		</div>
		@endforeach
	</div>
	@endif
	<div class="row center-align">
		<div class="col s6">
			<button type="button" class="btn waves-effect waves-light">
				Cancelar
				<i class="material-icons right">cancel</i>
			</button>
		</div>
		<div class="col s6">
			<button type="submit" class="btn waves-effect waves-light">
				Actualizar producto
				<i class="material-icons right">send</i>
			</button>
		</div>
	</div>
</form>
@endsection
@section('extraimports')
<link rel="stylesheet" href="{{ asset('css/product-edit.css') }}">
@endsection