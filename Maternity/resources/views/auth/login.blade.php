@extends('layouts.master')

@section('content')

	<section class="content login">
	<h2>login</h2>

		<form method="POST" action="/auth/login">
		    {!! csrf_field() !!}

	        <p>Email</p>
	        <input type="email" name="email" value="{{ old('email') }}">
	        <p class="error hide">Your email is not valid</p>
		   
	        <p>Password</p>
	        <input type="password" name="password" id="password">
	        <p class="error">Your password is not valid</p>

	        <button type="submit" class="submit">Login</button>
		</form>
	</section>
@stop