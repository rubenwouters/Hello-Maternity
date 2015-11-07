@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="/">back</a>
	</section>

	<section class="content">
		<div class="product-wrapper">
			<div class="product">
				{!! Html::image('clothes_pictures/' . $product->image) !!}
				<div class="info-wrapper">
					<h1>{{$product->brand}}</h1>
					<div class="price"><span>&euro;</span>{{$product->price}}</div>
					<div class="size">{{$product->size}}</div>
					<div class="colors">
						@foreach($product->colors as $color)
							<div style="background-color: {{$color->name}}"></div>
						@endforeach
					</div>
				</div>

				{{-- CHECK IF IS IN BAG --}}
				@if( in_array($product->id, $bag) )
					<a href="/bag/remove/{{$product->id}}" class="rect-link mega">Remove from bag</a>
				@else
					<a href="/bag/add/{{$product->id}}" class="rect-link mega">Put in bag</a>
				@endif
			</div>

			<div class="content hairline">&nbsp;</div>

			<div class="provider profile">
				<h2>Provider</h2>
				@if($user->picture != "")	
					{!! Html::image('profile_pictures/' . $user->picture, 'profile picture') !!}
				@else
					<img src="/img/lady_placeholder.svg">
				@endif

				<div>
					<p><span class="name">{{$user->name}}</span><br>
					{{$user->location}}</p>
				</div>
			</div>
		</div>

		<div class="content hairline related">&nbsp;</div>
		
		<div class="related">
			<h2>related</h2>
			@foreach($related as $key => $product)

				<article>
					<a href="">
						{!! Html::image('clothes_pictures/' . $product->image) !!}
						<div class="price"><span>&euro;</span>{{$product->price}}</div>
						<div class="size">{{$product->size}}</div>
					</a>
				</article>
			@endforeach
		</div>
	</section>
@stop