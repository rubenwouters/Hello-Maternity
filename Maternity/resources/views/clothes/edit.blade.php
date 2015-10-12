@extends('layouts.master')

@section('content')

	<section class="content login">
		<h2>edit your piece</h2>
		{!! Form::open(array('action' => array('ClothesController@updateClothes'))) !!}
			
			<p>Brand</p>
			<input type="text" name="brand" value="{{$product->brand}}">
			<div class="horziontal-cozy">
				<div>
					<p>Type</p>

					<select name="type">
						@foreach($types as $type)
							<option <?php if($type->id == $selectedType) echo "selected" ?> name="type" value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
				</div>
				<div>
					<p>Size</p>
					<select name="size">
					  <option <?php if($product->size == "XS") echo 'selected' ?> value="XS">Extra Small</option>
					  <option <?php if($product->size == "S") echo 'selected' ?> value="S">Small</option>
					  <option <?php if($product->size == "M") echo 'selected' ?> value="M">Medium</option>
					  <option <?php if($product->size == "L") echo 'selected' ?> value="L">Large</option>
					  <option <?php if($product->size == "XL") echo 'selected' ?> value="XL">Extra Large</option>
					</select>
				</div>
			</div>
			<p>Price</p>
			<input type="text" name="price" value="{{$product->price}}">
			

			<p>Colors</p>
			<p class="info">
				Are you like… hu?? Select some colors that are the closest to the piece you want to add. <br>
				This helps other people better find your clothes.
			</p>
			<div class="colors">

				@foreach($colors as $color)
					<input <?php if(in_array($color->id, $selectedColors)) echo "checked='true'" ?> type="checkbox" value="{{$color->id}}" id="color" name="colors[]" style="background-color: {{ $color->name }};">
				@endforeach
			</div>


			<p>Image</p>
			<p class="info">
				Some tips…<br>
				To get your clothes sold faster we recommend you to take a picture while you're wearing the clothes.<br>
				For an even better result try standing in front of a white wall in preferably natural light.
			</p>


			<input type="file" value="">
			<p>Preview Image</p>
			{!! Html::image('img/product_2.png', 'pants') !!}
			<input type="submit" class="submit" value="save changes">
		{!! Form::close() !!}
	</section>

@stop