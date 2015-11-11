@extends('layouts.master')

@section('content')
	<section class="cover-slider pic-1">
		<div>
			<p>Inspiration board</p>
			<a class="arrow left">{!! Html::image('img/arrow.svg', 'arrow left') !!}</a>
			<a class="arrow right">{!! Html::image('img/arrow.svg', 'arrow right') !!}</a>
		</div>
	</section>

	<section class="content featured">
		<h2>Featured Products</h2>
		<div class="featured-clothes-wrapper">
			
			@foreach($products as $product)
				<article>
					<a class="test" href="/product/view/{{$product->id}}">
						{!! Html::image('clothes_thumbnail/' . $product->image) !!}
						<h1> {{$product->brand}} </h1>
						<div class="price"><span>&euro;</span>{{$product->price}}</div>
						<div class="size">{{$product->size}}</div>
						<div class="colors">
							@foreach($product->colors as $color)
								<a href="/search/color/{{$color->id}}"><div style="background-color: {{$color->name}}"></div></a>
							@endforeach
						</div>
					</a>
					@if( in_array($product->id, $wishlist) )
						<a class="heart close-view" href="/heartbag/remove/{{$product->id}}"><span>remove from heartbag </span><img src="/img/heart.svg"></a>
					@elseif( in_array($product->id, $bag))
						<a class="heart close-view"><span>Already in your bag</span><img src="/img/heart_gray.svg"></a>
					@else
						<a class="heart close-view" href="/heartbag/add/{{$product->id}}"><span>add piece to heartbag </span><img src="/img/heart_gray.svg"></a>
					@endif
				</article>
			@endforeach

		</div> <!-- end of featured-clothes-wrapper -->
	</section>
@stop
		