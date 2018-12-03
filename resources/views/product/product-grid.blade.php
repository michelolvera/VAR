<div id="products" class="row">
	@foreach ($products as $product)
	<div class="col s12 m6 l3">
		<div class="card hoverable large" style="height: 590px;">
			<div class="card-image">
				<img src="{{ asset('img/'.$product->product_img_names()->first()->name) }}">
				<span class="card-title">{{ $product->name }}</span>
			</div>
			<div class="card-content">
				<p>{{ $product->description }}</p>
			</div>
			<div class="card-action">
				<a href="/product/{{ $product->slug }}">A solo ${{ $product->price * (1-$product->discount_percent/100) }}</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
