@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="">back</a>
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
				<a href="/bag/add/{{$product->id}}" class="rect-link mega">Put in bag</a>
			</div>

			<div class="content hairline">&nbsp;</div>

			<div class="provider profile">
				<h2>Provider</h2>
				{!! Html::image('profile_pictures/' . $user->picture) !!}
				<div>
					<p><span class="name">{{$user->name}}</span><br>
					{{$user->location}}</p>
				</div>
			</div>
		</div>

		<div class="content hairline related">&nbsp;</div>
		
		<div class="related">
			<h2>related</h2>
			{{-- <div>
				<article>
					<a href="">
						<img src="img/product_1.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>
				</article>
				<article>
					<a href="">
						<img src="img/product_3.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>

				</article>
				<article>
					<a href="">
						<img src="img/product_2.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>
				</article>
				<article>
					<a href="">
						<img src="img/product_3.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>
				</article>
				<article>
					<a href="">
						<img src="img/product_2.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>
				</article>
				<article>
					<a href="">
						<img src="img/product_1.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>

				</article>
				<article>
					<a href="">
						<img src="img/product_2.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>
				</article>
				<article>
					<a href="">
						<img src="img/product_3.png">
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
					</a>
				</article>
			</div> --}}
		</div>
	</section>
@stop