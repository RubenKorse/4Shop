@extends('layouts.app')

@section('content')

        <a href="/">home</a>
    @foreach($categories as $category)
        <a href="{{ route('categories.showcategory', $category) }}">{{ $category->name }}</a>
    @endforeach

	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
                            @if(!empty($product->discount))
                                <p class="korting">Nu {{$product->discount}}% korting!</p>
                                <?php $oldprice = $product->price / (1 - ($product->discount / 100)) ?>
                                <p>oude prijs: {{ $oldprice }}</p>
                            @endif
						@endunless
					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection
