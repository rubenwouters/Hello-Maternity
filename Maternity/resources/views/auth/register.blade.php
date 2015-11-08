@extends('layouts.master')

@section('content')
	<section class="content login">
	<h2>create account</h2>
		{!! Form::open(array('url' => 'auth/register')) !!}


			{!! csrf_field() !!}

			<p> {!! Form::label('name', 'Name'); !!} </p>
			{!! Form::text('name') !!}
			<p class="error">{{ $errors->first('name') }}</p>

			<p> {!! Form::label('email', 'Email'); !!} </p>
			{!! Form::email('email') !!}
			<p class="error">{{ $errors->first('email') }}</p>

			<p> {!! Form::label('password', 'Password'); !!} </p>
			{!! Form::password('password', array('id' => 'password')) !!}
			<p class="error">{{ $errors->first('password') }}</p>

			<p> {!! Form::label('password_confirmation', 'Confirm Password'); !!} </p>
			{!! Form::password('password_confirmation', array('id' => 'password')) !!}
			<p class="error">{{ $errors->first('password_confirmation') }}</p>

			<p> {!! Form::label('location', 'Location'); !!} </p>
			{!! Form::text('location') !!}
			<p class="error">{{ $errors->first('location') }}</p>

			<div>
				{!! Form::submit('Create account', array('class' => 'submit')) !!}
			</div>

		{!! Form::close() !!}
	</section>
@stop