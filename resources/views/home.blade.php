@extends('layouts.app')

@section('content')
@if (count($slides) > 0)
<div class="slider">
    <ul class="slides">
        @foreach ($slides as $slide)
        <li>
            @if ($slide->redirect != null)
            <a href="{{ $slide->redirect }}"><img src="img/{{ $slide->img_url }}"></a>
            @else
            <img src="img/{{ $slide->img_url }}">
            @endif
            <div class="caption center-align">
                <h3>{{ $slide->title }}</h3>
                <h5 class="light grey-text text-lighten-3">{{ $slide->text }}</h5>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
@if (count($discounts) > 0)
<div id="discount" class="row">
    <div class="carousel">
        @foreach ($discounts as $discount)
        <div class="carousel-item">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/crop'.$discount->product_img_names()->first()->name) }}">
                    <span class="card-title">{{ $discount->name }}</span>
                </div>
                <div class="card-content" style="padding: 0.5em;">
                    <p class="truncate">{{ $discount->description }}</p>
                </div>
                <div class="card-action" style="padding: 0.5em;">
                    <a href="product/{{ $discount->slug }}">De ${{ $discount->price }} a ${{ $discount->price * (1-$discount->discount_percent/100) }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <h2 class="center-align subindex">Ofertas</h2>
</div>
@endif
@if (count($pinneds) > 0)
<div id="pinned" class="row">
    <div class="carousel">
        @foreach ($pinneds as $pinned)
        <div class="carousel-item">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/crop'.$pinned->product_img_names()->first()->name) }}">
                    <span class="card-title">{{ $pinned->name }}</span>
                </div>
                <div class="card-content" style="padding: 0.5em;">
                    <p class="truncate">{{ $pinned->description }}</p>
                </div>
                <div class="card-action" style="padding: 0.5em;">
                    <a href="product/{{ $pinned->slug }}">A solo ${{ $pinned->price * (1-$pinned->discount_percent/100) }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <h2 class="center-align subindex">Destacados</h2>
</div>
@endif
@if (count($bestsellers) > 0)
<div id="bestseller" class="row">
    <div class="carousel">
        @foreach ($bestsellers as $bestseller)
        <div class="carousel-item">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/crop'.$bestseller->product_img_names()->first()->name) }}">
                    <span class="card-title">{{ $bestseller->name }}</span>
                </div>
                <div class="card-content" style="padding: 0.5em;">
                    <p class="truncate">{{ $bestseller->description }}</p>
                </div>
                <div class="card-action" style="padding: 0.5em;">
                    <a href="product/{{ $bestseller->slug }}">A solo ${{ $bestseller->price * (1-$bestseller->discount_percent/100) }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <h2 class="center-align subindex">Mas vendidos</h2>
</div>
@endif
<div class="divider"></div>
<div id="random" class="row grid">
    @include('product.product-grid')
</div>
@endsection
@section('extraimports')
<script src="{{ asset('js/home.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
</style>
@endsection