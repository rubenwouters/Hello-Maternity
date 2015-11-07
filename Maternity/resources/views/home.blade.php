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
					<a href="/product/view/{{$product->id}}">
						{!! Html::image('clothes_pictures/' . $product->image) !!}
						<h1> {{$product->brand}} </h1>
						<div class="price"><span>&euro;</span>{{$product->price}}</div>
						<div class="size">{{$product->size}}</div>
						<div class="colors">
							@foreach($product->colors as $color)
								<div style="background-color: {{$color->name}}"></div>
							@endforeach
						</div>
					</a>
				</article>
			@endforeach

		</div> <!-- end of featured-clothes-wrapper -->
	</section>
@stop
		