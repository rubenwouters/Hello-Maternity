<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Hello Maternity</title>

		{{-- <link rel="stylesheet" type="text/css" href="css/style.min.css"> --}}
		{!! Html::style('css/style.min.css') !!}
	</head>
	<body>
		<!--[if lte IE 8]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<header>
			<div class="search-clothes"> <!-- active -->
				<a id="search">search clothes</a>
				{!! Form::open(array('method' => 'get', 'action' => array('SearchController@search'), 'class' => 'search-fields')) !!}
					
					<div class="clothes">
						<label>select the type of clothing you'd like to search for</label>
						<div>
							@foreach($types as $type)
								<input type="radio" name="clothes" value="{{$type->id}}">
							@endforeach
						</div>
					</div>

					{{-- SIZES --}}
					<div class="sizes">
						<label>select your size</label>
						<div>
							<input type="radio" name="size" value="XS">
							<input type="radio" name="size" value="S">
							<input type="radio" name="size" value="M">
							<input type="radio" name="size" value="L">
							<input type="radio" name="size" value="XL">
						</div>
					</div>


					{{-- PRICE --}}
					<div class="price">
						<label>add your desired minimum and maximun price</label>
						<div class="price-entry">
							<div>
								<label>min. in €</label>
								@if(isset($minPrice))
									<input name="minPrice" type="text" id="min_price" value="{{$minPrice}}">
								@else
									<input name="minPrice" type="text" id="min_price" value="0">
								@endif
							</div>
							<div>
								<label>max. in €</label>
								@if(isset($maxPrice))
									<input name="maxPrice" type="text" id="max_price" value="{{$maxPrice}}">
								@else
									<input name="maxPrice" type="text" id="max_price" value="0">
								@endif

							</div>
						</div>
					</div>

					{{-- COLORS --}}
					<div class="color">
						<label>Select some colors you like</label>
						<div class="colors search">
							@foreach($colors as $color)
								<input type="checkbox" value="{{$color->id}}" id="color" name="colors[]" style="background-color: {{ $color->name }};">
							@endforeach
						</div>
					</div>
					{{-- SEARCH BTN --}}
					<div class="search">{!! Form::submit('search') !!}</div>
					{{-- <div class="search"><a href="/search">search</a></div> --}}
				{!! Form::close() !!}
			</div>

			{{-- LOGO --}}
			<h1><a href="/">{!! Html::image('img/logo.svg', 'Hello Maternity') !!}</a></h1>
			
			{{-- LOGIN/REGISTER CONTROLS --}}
			<div class="login">
				@if( Auth::check() )
					<p>
						<span class="bolder">Welcome {{ Auth::user()->name}}</span> <a href="/dashboard">dashboard</a> | <a href="/auth/logout">logout</a>
					</p>
					<p>
						<a href="/heartbag"><img src="/img/heart.svg" class="heartbag">({{ count($heartBag)}})</a> | <a href="/bag"><span class="bolder">bag</span> ({{ count($bagContent)}}) </a>
					</p>
				@else
					<p>
						<a href="/auth/login">login</a> | <a href="/auth/register">register</a>
					</p>
				@endif
			</div>
		</header>

		@yield('content')


		<footer>
			<div class="bg-gradient horizontal"></div>
			<div class="bg-gradient vertical"></div>
			<p><span class="copy">copyright &copy; 2015 <span class="bolder">Hello Maternity</span></span>
			design &amp; front-end development <a href="http://driesvanschevensteen.com" target="_blank">Dries Van Schevensteen</a><br>
			back-end development <a href="http://rubenwouters.be/" target="_blank">Ruben Wouters</a>
		</footer>
		
	
		{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') !!}
		{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js') !!}
		{!! Html::script('js/app.js') !!}
	</body>
</html>