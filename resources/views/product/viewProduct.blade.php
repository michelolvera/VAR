@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col s12 m6">
        @if ($product->product_img_names()->count() > 0)
        <div class="fotorama">
            @foreach ($product->product_img_names()->get() as $slide)
            <img src="{{ asset('img/'.$slide->name) }}"> @endforeach
        </div>
        @endif
    </div>
    <div class="col s12 m6">
        <p style="font-weight: bold;">{{ $product->name }}</p>
        @if ($product->discount_percent>0)
        <p style="font-weight: bold;">Precio: <span style="color:#993333;text-decoration: line-through;">${{ $product->price }}</span></p>
        <p style="font-weight: bold;">Descuento: <span style="color:#993333">{{ $product->discount_percent }}%</span></p>
        <p style="font-weight: bold;">Precio con descuento: <span style="color:#993333">${{ round(($product->price)-(($product->price)*(($product->discount_percent)/100)),2) }}</span></p>
        @else
        <p style="font-weight: bold;">Precio: <span style="color:#993333;">${{ $product->price }}</span></p>
        @endif
        <p><span style="color:green">{{ $product->quantity }}</span> disponibles.</p>
        <div class="divider"></div>
        <p style="text-align: justify;">{{ $product->description }}</p>
        <div class="divider"></div>
        <div class="right">
            <button class="waves-effect waves-light btn" style="margin: 1em 0;" onclick="agregarCarrito('{{ $product->slug }}')"><i class="material-icons right">add_shopping_cart</i>Agregar al carrito</button>
        </div>
    </div>
</div>
<div class="divider"></div>
<div class="row" id="comments">
    <h5>Preguntas y respuestas</h5>
    <form class="col s12" action="/comment/{{ $product->slug }}" method="POST">
        @csrf
        <h6>Pregunta:</h6>
        <div class="row">
            <div class="input-field col s12 m10">
                <textarea id="text" class="materialize-textarea" name="text" required>{{ old('text') }}</textarea>
                <label for="text">Escribe una pregunta...</label> @if ($errors->has('text'))
                <div class="card-panel teal">
                    <span class="white-text">{{ $errors->first('text') }}</span>
                </div>
                @endif
            </div>
            <div class="input-field col s12 m2">
                <button class="waves-effect waves-light btn" type="submit">Enviar<i class="material-icons right">forum</i></button>
            </div>
        </div>
    </form>
    @if (count($product->comments()->get())>0)
    <div class="col s12">
        @foreach ($product->comments()->get() as $comment)
        <p><i class="material-icons">comment</i> <span style="font-weight: bold;">{{ $comment->user()->first()->name }}: </span>{{ $comment->text }}</p>
        @if ($comment->replie()->first()!=null)
        <div>
            <p><i class="material-icons">message</i><span style="color: #999;"> {{ $comment->replie()->first()->text }}</span></p>
        </div>
        @endif
        <div class="divider"></div>
        @endforeach
    </div>
    @endif
</div>
@auth
@if (Auth::user()->admin)
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
            <i class="large material-icons">menu</i>
        </a>
    <ul>
        <li><a id="delete_btn" href="#" class="btn-floating red"><i class="material-icons">delete</i></a></li>
        <li><a href="../product/{{ $product->slug }}/edit" class="btn-floating"><i class="material-icons">mode_edit</i></a></li>
    </ul>
</div>

<form id="delete-form" action="/product/{{ $product->slug }}" method="POST" style="display: none;">
    @method('DELETE') @csrf
</form>
@endif
@endauth

@endsection

@section('extraimports')
<script src="{{ asset('js/product/show.js') }}"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<!-- 16 KB -->
@endsection
