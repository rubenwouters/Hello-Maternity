@extends('layouts.master')

@section('content')
	<section class="cover-slider">
		<div class="slider img1 show"></div>
		<div class="slider img2"></div>
		<div class="slider img3"></div>
		<div class="slider img4"></div>
		<div class="slider img5"></div>
		<div class="slider img6"></div>
		<div class="slider img7"></div>
		<div class="nav">
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
					@if( in_array($product->id, $wishlist))
						<a class="heart close-view with-links"><span>Already in your heartbag</span><img src="/img/heart.svg"></a>
					@else
						<a class="heart close-view with-links" href="/heartbag/add/{{$product->id}}"><span>add piece to heartbag </span><img src="/img/heart_gray.svg"></a>
					@endif
					<div class="product-nav">
						@if( !in_array($product->id, $bag) )
							<a href="/bag/add/{{ $product->id }}" class="rect-link">put in bag</a>
						@else 
							<a class="rect-link">already in bag</a>
						@endif
					</div>
				</article>
			@endforeach

		</div> <!-- end of featured-clothes-wrapper -->
	</section>
@stop
		