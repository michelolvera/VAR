@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m6" style="width: 20.5rem;">
        @if ($product->product_img_names()->count() > 0)
        <div class="slider">
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
    <div class="col s12 m6">
       <p style="font-weight: bold;">{{ $product->name }}</p>
       @if ($product->discount_percent>0)
       <p style="font-weight: bold;">Precio: <span style="color:#993333;text-decoration: line-through;">${{ $product->price }}</span></p>
       <p style="font-weight: bold;">Descuento: <span style="color:#993333">{{ $product->discount_percent }}%</span></p>
       <p style="font-weight: bold;">Precio con descuento: <span style="color:#993333">${{ ($product->price)-(($product->price)*(($product->discount_percent)/100)) }}</span></p>
       @else
       <p style="font-weight: bold;">Precio: <span style="color:#993333;">${{ $product->price }}</span></p>
       @endif
       <p><span style="color:green">{{ $product->quantity }}</span> disponibles.</p>
       <div class="divider"></div>
       <p style="text-align: justify;">{{ $product->description }}</p>
       <div class="divider"></div>
       <div class="right">
        <button class="waves-effect waves-light btn" style="margin-top: 1em;" onclick="agregarCarrito('{{ $product->slug }}')"><i class="material-icons right">add_shopping_cart</i>Agregar al carrito</button>
    </div>
</div>
<div id="comentarios" class="row">
<div class="col s12 m12 divider"></div>
<div class="col s12 m12 divider"></div>
<h5 class="col s12 m12">Comentarios</h5>
    @foreach ($comments as $comment)
            <div class="col s12 m12">
                @foreach ($users as $user)
                    @if($user->id==$comment->cuid)
                        <span style="font-weight: bold;">
                            <i class="material-icons" >rate_review</i>
                            {{$user->name}}:
                        </span>
                    @endif
                @endforeach
                <span>
                    {{$comment->ct}}
                </span>
                
                <div>
                    @foreach ($users as $user)
                        @if($user->id==$comment->ruid)
                            <span style="color:gray;">
                                <i class="material-icons">question_answer</i> 
                            </span> 
                            <span style="font-weight: bold;">
                                {{$user->name}}:
                            </span>
                        @endif
                    @endforeach
                    <span>
                        {{$comment->rt}}
                    </span>
                </div>
                <div class="divider"></div>
            </div>
    @endforeach
</div>







<form method="POST" action="/comment">
	@csrf
	<div class="row">
		<div class="input-field col s12 m12">
        <h5 class="col s12 m12">¿Dudas o comentarios? Escríbelo aquí abajo!</h5>
            <!--Investigando cómo obtener el nombre del usuario o: -->
            <input name="title" type="text" value="" required>
            <input name="user_id" style="display:none;" value="1">
            <input name="product_id" style="display:none;" value="{{$product->id}}">
			<input name="text" type="text" value="" required>
		</div>
	</div>
	<div class="row center-align">
		<div class="col s6">
			<button type="submit" class="btn waves-effect waves-light">
				Comentar
				<i class="material-icons right">send</i>
			</button>
		</div>
	</div>
</form>















<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li><a id="delete_btn" href="#" class="btn-floating red"><i class="material-icons">delete</i></a></li>
        <li><a href="../product/{{ $product->slug }}/edit"class="btn-floating"><i class="material-icons">mode_edit</i></a></li>
    </ul>
</div>
<form id="delete-form" action="/product/{{ $product->slug }}" method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>
@endsection
@section('extraimports')
<script src="{{ asset('js/product/show.js') }}"></script>
@endsection