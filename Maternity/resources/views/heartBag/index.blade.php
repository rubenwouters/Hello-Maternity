@extends('layouts.master')

@section('content')

	<section class="content">

		<h2>Your heartbag</h2>

		<div class="featured-clothes-wrapper spacing-top">

			@if(isset($products))

				@foreach($products as $product)
					<article>
						<a href="/product/view/{{$product->id}}">
							{!! Html::image('clothes_thumbnail/' . $product->image) !!}
							<h1>{{$product->brand}}</h1>
							<div class="price"><span>&euro;</span>{{$product->price}}</div>
							<div class="size">{{$product->size}}</div>
							<div class="colors">
								@foreach($product->colors as $color)
									<div style="background-color: {{$color->name}}"></div>
								@endforeach
							</div>
						</a>
						<div class="product-nav">
							<a href="/heartbag/tobag/{{ $product->id }}" class="rect-link">add to bag</a>
							<a href="/heartbag/remove/{{$product->id}}" class="rect-link dark lighter-hover">remove</a>
						</div>
					</article>

				@endforeach
			@else
				Aw! Nothing in your bag yet!
			@endif

		</div>

	</section>

@stop