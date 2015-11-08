@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="/dashboard">back</a>
	</section>

	<section class="content login">
		<h2>edit your piece</h2>
		{!! Form::open(array('action' => array('ClothesController@updateClothes', $product->id), 'files' => true)) !!}
			
			{{-- BRAND --}}
			<p>{!! Form::label('brand', 'Brand'); !!}</p>
			<input type="text" name="brand" value="{{$product->brand}}">
			<p class="error">{{ $errors->first('brand') }}</p>

			{{-- TYPE & SIZE --}}
			<div class="horziontal-cozy">
				<div>
					<p>{!! Form::label('type', 'Type'); !!}</p>
					<select name="type">
						@foreach($types as $type)
							<option @if ($type->id === $selectedType) selected  @endif name="type" value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
				</div>
				<div>
					<p>{!! Form::label('size', 'Size'); !!}</p>
					<select name="size">
						<option @if($product->size == 'XS') selected @endif value="XS">Extra Small</option>
						<option @if($product->size == 'S') selected @endif value="S">Small</option>
						<option @if($product->size == 'M') selected @endif value="M">Medium</option>
						<option @if($product->size == 'L') selected @endif value="L">Large</option>
						<option @if($product->size == 'XL') selected @endif value="XL">Extra Large</option>
					</select>
				</div>
			</div>
			
			{{-- PRICE --}}
			<p>{!! Form::label('price', 'Price €'); !!}</p>
			<input type="text" name="price" value="{{$product->price}}">
			<p class="error">{{ $errors->first('price') }}</p>
			
			{{-- COLORS --}}
			<p>{!! Form::label('colors', 'Colors'); !!}</p>
			<p class="info">
				Are you like… hu?? Select some colors that are the closest to the piece you want to add. <br>
				This helps other people better find your clothes.
			</p>
			<div class="colors">
				@foreach($colors as $color)
					<input 
						@if( in_array($color->id, $selectedColors) ) checked="true" @endif 
						type="checkbox" 
						value="{{$color->id}}" 
						id="color" 
						name="colors[]" 
						style="background-color: {{ $color->name }};">
				@endforeach
			</div>
			<p class="error">{{ $errors->first('colors') }}</p>

			{{-- IMAGE --}}
			<p>{!! Form::label('image', 'Image'); !!}</p>
			<p class="info">
				Some tips…<br>
				To get your clothes sold faster we recommend you to take a picture while you're wearing the clothes.<br>
				For an even better result try standing in front of a white wall in preferably natural light.
			</p>
			{!! Form::file('file', '' ,array('name' => 'file')) !!}
			<p class="error">{{ $errors->first('file') }}</p>
	
			{{-- CURRENT IMAGE --}}
			<p>{!! Form::label('currentImage', 'Current image'); !!}</p>
			{!! Html::image('clothes_thumbnail/' . $product->image, 'pants') !!}

			{!! Form::submit('save changes', array('class' => 'submit')) !!}
		{!! Form::close() !!}
	</section>

@stop