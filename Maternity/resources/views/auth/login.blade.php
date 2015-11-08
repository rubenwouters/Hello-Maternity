@extends('layouts.master')

@section('content')

	<section class="content login">
		
		<h2>login</h2>

		{!! Form::open(array('url' => 'auth/login')) !!}
		    {!! csrf_field() !!}

	        <p> {!! Form::label('email', 'Email'); !!} </p>
	        {!! Form::email('email') !!}
	        <p class="error"> {{ $errors->first('email') }} </p>
		   
	        <p> {!! Form::label('password', 'Password'); !!} </p>
	        {!! Form::password('password', array('id' => 'password')) !!}
	        <p class="error"> {{ $errors->first('password') }} </p>

	        {!! Form::submit('Login', array('class' => 'submit')) !!}
		{!! Form::close() !!}
	</section>
@stop