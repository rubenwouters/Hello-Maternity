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
							<a href="/search/color/{{$color->id}}"><div style="background-color: {{$color->name}}"></div></a>
						@endforeach
					</div>


					@if( in_array($product->id, $wishlist) )
						<a class="heart close-view" href="/heartbag/remove/{{$product->id}}"><span>remove from heartbag </span><img src="/img/heart.svg"></a>
					@elseif( in_array($product->id, $bag))
						<a class="heart close-view"><span>Already in your bag</span><img src="/img/heart_gray.svg"></a>
					@else
						<a class="heart close-view" href="/heartbag/add/{{$product->id}}"><span>add piece to heartbag </span><img src="/img/heart_gray.svg"></a>
					@endif

					
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
					<a href="/product/view/{{$product->id}}">
						{!! Html::image('clothes_thumbnail/' . $product->image) !!}
						<div class="price"><span>&euro;</span>{{$product->price}}</div>
						<div class="size">{{$product->size}}</div>
					</a>
					@if( in_array($product->id, $wishlist) )
						<a class="heart related-view" href="/heartbag/remove/{{$product->id}}"><span>remove from heartbag </span><img src="/img/heart.svg"></a>
					@elseif( in_array($product->id, $bag))
						<a class="heart related-view"><span>Already in your bag</span><img src="/img/heart_gray.svg"></a>
					@else
						<a class="heart related-view" href="/heartbag/add/{{$product->id}}"><span>add piece to heartbag </span><img src="/img/heart_gray.svg"></a>
					@endif
				</article>
			@endforeach
		</div>
	</section>
@stop