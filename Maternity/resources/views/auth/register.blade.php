@extends('layouts.master')

@section('content')

	<section class="content login">
	<h2>create account</h2>

		<form method="POST" action="/auth/register">
		    {!! csrf_field() !!}

		        <p>Name</p>
		        <input type="text" name="name" value="{{ old('name') }}">

		        <p>Email</p>
		        <input type="email" name="email" value="{{ old('email') }}">

		        <p>Password</p>
		        <input type="password" name="password">

		        <p>Confirm Password</p>
		        <input type="password" name="password_confirmation">
	
		        <p>Location</p>
		        <input type="text" name="location" value="{{ old('location') }}">

		    <div>
		        <input type="submit" class="submit" value="create account">
		    </div>
		</form>
	</section>
@stop