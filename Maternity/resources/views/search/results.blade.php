@extends('layouts.master')

@section('content')
	<section class="content">
		<h2>Search result</h2>
	
		<div class="featured-clothes-wrapper">
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

			@if(count($results) < 1)
				Aw! :( No search results. 
			@endif
		</div>
	</section>
@stop