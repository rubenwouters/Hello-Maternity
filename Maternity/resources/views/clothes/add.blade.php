@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="/dashboard">back</a>
	</section>
	<section class="content login">
		<h2>Sell new piece</h2>
		{!! Form::open(array('action' => array('ClothesController@saveClothes'), 'files' => true)) !!}
			
			<p>Brand</p>
			<input type="text" name="brand" value="">
			<p class="error hide">Your brand is not valid</p>

			<div class="horziontal-cozy">
				<div>
					<p>Type</p>
					<select name="type">
						@foreach($types as $type)
							<option name="type" value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
					<p class="error">Invalid type</p>
				</div>
				<div>
					<p>Size</p>
					<select name="size">
					  <option value="XS">Extra Small</option>
					  <option value="S">Small</option>
					  <option value="M">Medium</option>
					  <option value="L">Large</option>
					  <option value="XL">Extra Large</option>
					</select>
					<p class="error">Invalid size</p>
				</div>
			</div>

			<p>Price €</p>
			<input type="text" name="price" value="">
			<p class="error">Your price is not valid. Note: You should not the Euro sign</p>

			<p>Colors</p>
			<p class="info">
				Are you like… hu?? Select some colors that are the closest to the piece you want to add. <br>
				This helps other people better find your clothes.
			</p>
			<div class="colors">
				@foreach($colors as $color)
					<input type="checkbox" value="{{$color->id}}" id="color" name="colors[]" style="background-color: {{ $color->name }};">
				@endforeach
			</div>
			<p class="error">You did not select any colors, just click them… easy as pie</p>

			<p>Image</p>
			<p class="info">
				Some tips…<br>
				- To get your clothes sold faster we recommend you to take a picture while you're wearing the clothes.<br>
				- For an even better result try standing in front of a white wall with preferably natural light.
			</p>
			{!! Form::file('image') !!}
			<p class="error">Your image is not valid</p>

			<input type="submit" class="submit" value="add piece">

		{!! Form::close() !!}
	</section>
@stop