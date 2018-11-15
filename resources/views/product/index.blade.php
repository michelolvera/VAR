@extends('layouts.app')
@section('content')
<h2 class="subindex center-align">Todos los productos</h2>
@include('product.product-grid')
<div class="fixed-action-btn">
	<a href="product/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/product-index.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="{{ asset('js/floating-button.js') }}"></script>
@endsection