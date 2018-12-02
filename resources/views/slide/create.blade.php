@extends('layouts.app')
@section('content')
<form method="POST" action="/slide" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="input-field col s12 m6">
			<input name="title" type="text" value="{{ old('title') }}" required>
			<label for="title">Titulo</label>
			@if ($errors->has('title'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('title') }}</span>
			</div>
			@endif
		</div>
		<div class="input-field col s12 m6">
			<textarea id="text" class="materialize-textarea" name="text" required >{{ old('text') }}</textarea>
			<label for="text">Texto</label>
			@if ($errors->has('text'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('text') }}</span>
			</div>
			@endif
		</div>
        <div class="input-field col s12 m6">
			<input name="redirect" type="url" value="{{ old('redirect') }}">
			<label for="redirect">Enlace</label>
			@if ($errors->has('redirect'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('redirect') }}</span>
			</div>
			@endif
		</div>
        <div class="input-field file-field col s12 m6">
			<div class="btn">
				<span>Imagen</span>
				<input name="img_url" type="file" accept="image/*">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
			@if ($errors->has('img_url'))
			<div class="card-panel teal">
				<span class="white-text">{{ $errors->first('img_url') }}</span>
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

@endsection