@extends('layouts.app')
@section('content')
@if (isset($subcategories))
<h2 class="subindex center-align">Productos en la categoría {{$subcategories->first()->categorie()->first()->name}}</h2>
<ul class="collection with-header">
    <li class="collection-header">
        <h4>Subcategorías</h4>
    </li>
    @foreach ($subcategories as $subcategorie)
        <a href="/product/bysubcategorie/{{$subcategorie->slug}}"><li class="collection-item">{{$subcategorie->name}}</li></a>
    @endforeach
</ul>
@else
<h2 class="subindex center-align">Todos los productos</h2>
@endif
    @include('product.product-grid')
@auth
@if (Auth::user()->admin)
<div class="fixed-action-btn">
    <a href="/product/create" class="btn-floating btn-large red">
		<i class="large material-icons">mode_edit</i>
	</a>
</div>
<script src="{{ asset('js/floating-button.js') }}"></script>
@endif
@endauth
@endsection

@section('extraimports')
<script src="{{ asset('js/product-index.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection
