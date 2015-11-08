@extends('layouts.master')

@section('content')
	<section class="content">
		<h2>Search result</h2>
	
		<div class="featured-clothes-wrapper">
			@if(isset($results) && count($results) > 0)
			@foreach($results as $product)
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