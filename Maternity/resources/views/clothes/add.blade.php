@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="/dashboard">back</a>
	</section>
	<section class="content login">
		<h2>Sell new piece</h2>
		{!! Form::open(array('action' => array('ClothesController@saveClothes'), 'files' => true)) !!}
			
			{{-- BRAND --}}
			<p>{!! Form::label('brand', 'Brand'); !!}</p>
			{!! Form::text('brand') !!}
			<p class="error">{{ $errors->first('brand') }}</p>
			
			{{-- TYPE & SIZE --}}
			<div class="horziontal-cozy">
				<div>
					<p>{!! Form::label('type', 'Type'); !!}</p>
					<select name="type">
						@foreach($types as $type)
							<option {{ (Input::old("type") == $type->id ? "selected":"") }} name="type" value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
				</div>
				<div>
					<p>{!! Form::label('size', 'Size'); !!}</p>
					{!! Form::select('size', array('XS' => 'Extra Small', 'S' => 'Small', 'M' => 'Medium', 'L' => 'Large', 'XL' => 'Extra Large'), null); !!}
				</div>
			</div>

			{{-- PRICE --}}
			<p>{!! Form::label('price', 'Price €'); !!}</p>
			{!! Form::text('price') !!}
			<p class="error">{{ $errors->first('price') }}</p>

			{{-- COLORS --}}
			<p>{!! Form::label('colors', 'Colors'); !!}</p>
			<p class="info">
				Are you like… hu?? Select some colors that are the closest to the piece you want to add. <br>
				This helps other people better find your clothes.
			</p>

			<div class="colors">
				@foreach($colors as $key => $color)

					<input 
					@if( old('colors') != null && in_array($color->id, old('colors'))) checked="true" @endif
					type="checkbox" value="{{$color->id}}" id="color" name="colors[]" style="background-color: {{ $color->name }};">
				@endforeach
			</div>
			<p class="error">{{ $errors->first('colors') }}</p>
	
			{{-- IMAGE --}}
			<p>{!! Form::label('image', 'Image'); !!}</p>
			<p class="info">
				Some tips…<br>
				- To get your clothes sold faster we recommend you to take a picture while you're wearing the clothes.<br>
				- For an even better result try standing in front of a white wall with preferably natural light.
			</p>
			{!! Form::file('file', '' ,array('name' => 'file')) !!}
			<p class="error">{{ $errors->first('file') }}</p>
			
			{{-- SUMBIT BUTTON --}}
			{!! Form::submit('add piece', array('class' => 'submit')) !!}
		
		{!! Form::close() !!}
	</section>
@stop