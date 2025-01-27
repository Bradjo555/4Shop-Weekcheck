@extends('layouts.app')

@section('content')

	<div class="products">
		<ul>
			@foreach($products as $category)
				<li><a href="{{ url('categories/' . $category->id) }}">{{ $category->title }}</a></li>
			@endforeach
		</ul>
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
						@endunless

						@if ($product->discount > 0)
							<span style="color:red;">Nu <strong>{{ $product->discount }}</strong>% Korting!</span>
							<div>Orginele prijs: €{{$product->getRawOriginal('price')}}</div>
							</br>
						@endif
					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection