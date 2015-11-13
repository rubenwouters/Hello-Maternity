@extends('layouts.master')

@section('content')
	<section class="content">
		<h2>Search result</h2>
	
		<div class="featured-clothes-wrapper">
			@if(isset($results) && count($results) > 0)
			@foreach($results as $product)
				<article>
					<a href="/product/view/{{$product->id}}">
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
					<div class="product-nav">
						@if( !in_array($product->id, $bag) )
							<a href="/bag/add/{{ $product->id }}" class="rect-link">put in bag</a>
						@endif
					</div>
				</article>
			@endforeach

			@else

				<p class="error">
					{{ $errors->first('clothes') }}<br>
					{{ $errors->first('size') }}<br>
					{{ $errors->first('colors') }}<br>
					{{ $errors->first('maxPrice') }}<br>
					{{ $errors->first('minPrice') }}
				</p>

			@endif
		</div>
	</section>
@stop