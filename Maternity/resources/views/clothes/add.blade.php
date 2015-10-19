@extends('layouts.master')

@section('content')

	<section class="content login">
		<h2>Sell new piece</h2>
		{!! Form::open(array('action' => array('ClothesController@saveClothes'), 'files' => true)) !!}
			
			<p>Brand</p>
			<input type="text" name="brand" value="">
			<div class="horziontal-cozy">
				<div>
					<p>Type</p>
					<select name="type">
						@foreach($types as $type)
							<option name="type" value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
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
				</div>
			</div>
			<p>Price</p>
			<input type="text" name="price" value="">
			

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


			<p>Image</p>
			<p class="info">
				Some tips…<br>
				To get your clothes sold faster we recommend you to take a picture while you're wearing the clothes.<br>
				For an even better result try standing in front of a white wall in preferably natural light.
			</p>


			{{-- <input name="image" type="file" value=""> --}}
			{!! Form::file('image') !!}

			<p>Preview Image</p>
			{!! Html::image('img/product_2.png', 'pants') !!}
			<input type="submit" class="submit" value="add piece">
		{!! Form::close() !!}
	</section>

@stop