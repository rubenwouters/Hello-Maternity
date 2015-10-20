@extends('layouts.master')

@section('content')
	<section class="content profile">
			<h2>Profile</h2>
			{!! Html::image('profile_pictures/' . $user->picture, 'profile picture') !!}
			<div>
				<p>
					<span class="name">{{$user->name}}</span><br>
					{{$user->location}}</p>
				<a href="/settings" class="rect-link">update profile</a>
			</div>
		</section>

		<div class="content hairline">&nbsp;</div>

		<section class="content">
			<h2>My clothes to sell</h2>
			<a href="/dashboard/clothes/add" class="rect-link dark">offer new piece</a>
			
			<div class="featured-clothes-wrapper spacing-top">
				
				@foreach($products as $product)
					<article>
						<img src="clothes_pictures/{{ $product->image }}" alt="{{ $product->brand }}">
						<h1> {{ $product->brand }}</h1>
						<div class="price"><span>&euro;</span>{{ $product->price }}</div>
						<div class="size">{{ $product->size }}</div>
						<div class="colors">
							@foreach($product->colors as $color)
								<div style="background-color: {{$color->name}}"></div>
							@endforeach
						</div>

						<div class="product-nav">
							<a href="/dashboard/clothes/edit/{{ $product->id }}" class="rect-link">edit</a>
							<a href="/dashboard/clothes/delete/{{ $product->id }}" class="rect-link dark lighter-hover">remove</a>
						</div>
					</article>
				@endforeach
				
			</div>
		</section>

		<div class="hairline">&nbsp;</div>

		<section class="content">
			<h2>History Sold</h2>
			<a href="" class="rect-link dark">clear history</a>
			<div class="featured-clothes-wrapper spacing-top">
				<article>
					<a href="">
						<img src="img/product_1.png">
						<h1>Sweater - ASOS</h1>
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
						<div class="colors">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</article>

				<article>
					<a href="">
						<img src="img/product_2.png">
						<h1>Sweater - ASOS</h1>
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
						<div class="colors">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</article>

				<article>
					<a href="">
						<img src="img/product_3.png">
						<h1>Sweater - ASOS</h1>
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
						<div class="colors">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</article>
				
				<article>
					<a href="">
						<img src="img/product_1.png">
						<h1>Sweater - ASOS</h1>
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
						<div class="colors">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</article>

				<article>
					<a href="">
						<img src="img/product_2.png">
						<h1>Sweater - ASOS</h1>
						<div class="price"><span>&euro;</span>90</div>
						<div class="size">XS</div>
						<div class="colors">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</article>
			</div>
		</section>
@stop