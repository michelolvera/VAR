@extends('layouts.app')

@section('content')
<div class="row">
  <div class="input-field col s12 m6 center">
    @if ($product->product_img_names()->count() > 0)
    <div class="slider center" style="width:18.75em;">
        <ul class="slides">
            @foreach ($product->product_img_names()->get() as $slide)
            <li>
                <img src="{{ asset('img/'.$slide->name) }}">
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="input-field col s12 m6">
 <h4 style="font-weight: bold;">{{ $product->name }}</h4>
 @if ($product->discount_percent>0)
 <h6 style="font-weight: bold;">Precio: <span style="color:#993333;text-decoration: line-through;">${{ $product->price }}</span></h6>
 <h6 style="font-weight: bold;">Descuento: <span style="color:#993333">{{ $product->discount_percent }}%</span></h6>
 <h6 style="font-weight: bold;">Precio con descuento: <span style="color:#993333">${{ ($product->price)-(($product->price)*(($product->discount_percent)/100)) }}</span></h6>
 @else
 <h6 style="font-weight: bold;">Precio: <span style="color:#993333;">${{ $product->price }}</span></h6>
 @endif
 <h6><span style="color:green">{{ $product->quantity }}</span> disponibles.</h6>
 <div class="divider"></div>
 <h5>{{ $product->description }}</h5>
 <div class="divider"></div>
</div>  
<div class="right">
    <a class="waves-effect waves-light btn"><i class="material-icons right">add_shopping_cart</i>Agregar al carrito</a>
</div>
</div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li><a href="../product/{{ $product->slug }}"class="btn-floating red"><i class="material-icons">delete</i></a></li>
        <li><a href="../product/{{ $product->slug }}/edit"class="btn-floating"><i class="material-icons">mode_edit</i></a></li>
    </ul>
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/product/show.js') }}"></script>
@endsection