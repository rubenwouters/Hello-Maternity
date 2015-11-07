@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="/dashboard">back</a>
	</section>

	<section class="content login">
		<h2>edit your piece</h2>
		{!! Form::open(array('action' => array('ClothesController@updateClothes', $product->id), 'files' => true)) !!}
			
			<p>Brand</p>
			<input type="text" name="brand" value="{{$product->brand}}">
			<p class="error hide"><p class="error">{{ $errors->first('brand') }}</p></p>

			<div class="horziontal-cozy">
				<div>
					<p>Type</p>
					<select name="type">
						@foreach($types as $type)
							<option @if ($type->id === $selectedType) selected  @endif name="type" value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
				</div>
				<div>
					<p>Size</p>
					<select name="size">
						<option @if ($product->size = 'XS') selected @endif value="XS">Extra Small</option>
						<option @if ($product->size = 'S') selected @endif value="S">Small</option>
						<option @if ($product->size = 'M') selected @endif value="M">Medium</option>
						<option @if ($product->size = 'L') selected @endif value="L">Large</option>
						<option @if ($product->size = 'XL') selected @endif value="XL">Extra Large</option>
					</select>
				</div>
			</div>

			<p>Price €</p>
			<input type="text" name="price" value="{{$product->price}}">
			<p class="error">{{ $errors->first('price') }}</p>

			<p>Colors</p>
			<p class="info">
				Are you like… hu?? Select some colors that are the closest to the piece you want to add. <br>
				This helps other people better find your clothes.
			</p>
			<div class="colors">
				@foreach($colors as $color)
					<input 
						@if ( in_array($color->id, $selectedColors) ) checked="true" @endif 
						type="checkbox" 
						value="{{$color->id}}" 
						id="color" 
						name="colors[]" 
						style="background-color: {{ $color->name }};">
				@endforeach
			</div>
			<p class="error">{{ $errors->first('colors') }}</p>
			{{-- <p class="error">You did not select any colors, just click them… easy as pie</p> --}}

			<p>Image</p>
			<p class="info">
				Some tips…<br>
				To get your clothes sold faster we recommend you to take a picture while you're wearing the clothes.<br>
				For an even better result try standing in front of a white wall in preferably natural light.
			</p>
			{!! Form::file('file', '' ,array('name' => 'file')) !!}
			<p class="error">{{ $errors->first('file') }}</p>

			<p>Preview Image</p>
			{!! Html::image('clothes_pictures/' . $product->image, 'pants') !!}
			<input type="submit" class="submit" value="save changes">
		{!! Form::close() !!}
	</section>

@stop