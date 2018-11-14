@extends('layouts.app')
@section('content')
<h2 class="subindex center-align">Todos los productos</h2>
@include('product.product-grid')
@endsection
@section('extraimports')
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('js/product-index.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection