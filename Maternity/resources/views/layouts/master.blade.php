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
				<a href="">search clothes</a>
				<div class="search-fields">
					<div class="distribute">
						<div>{!! Html::image('img/icon_pants.svg', 'pants') !!}</div>
						<div>{!! Html::image('img/icon_top.svg', 'tops') !!}</div>
						<div>{!! Html::image('img/icon_dress.svg', 'dresses') !!}</div>
						<span class="stretch"></span>
					</div>
					<div class="distribute">
						<div>XS</div>
						<div>S</div>
						<div>M</div>
						<div>L</div>
						<div>XL</div>
						<span class="stretch"></span>
					</div>
					<div>
						PRICE
					</div>
					<div class="colors">
						{!! Html::image('img/colors_all.png', 'colors', array('height' => '26', 'width' => '26')) !!}</a>
						<div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
					<div class="search"><a href="">search</a></div>
				</div>
			</div>
			<a href="/"><h1>{!! Html::image('img/logo.svg', 'Hello Maternity') !!}</h1></a>
			<div class="login">

				@if( Auth::check() )
					<p><span class="bolder">Welcome Jane Doe</span> <a href="">dashboard</a> | <a href="/auth/logout">logout</a></p>
					<p><a href=""><span class="bolder">bag</span> (3)</a></p>
				@else
					<p><a href="/auth/login">login</a> | <a href="/auth/register">register</a></p>
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
		{!! Html::script('js/app.js') !!}
	</body>
</html>