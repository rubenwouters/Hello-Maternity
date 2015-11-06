@extends('layouts.master')

@section('content')
	<section class="content login">
	<h2>create account</h2>
		<form method="POST" action="/auth/register">

			{!! csrf_field() !!}

			<p>Name</p>
			<input type="text" name="name" value="{{ old('name') }}">
			<p class="error hide">Your name is not valid</p>

			<p>Email</p>
			<input type="email" name="email" value="{{ old('email') }}">
			<p class="error">Your email is not valid</p>

			<p>Password</p>
			<input type="password" name="password">
			<p class="error">Your password is not valid</p>

			<p>Confirm Password</p>
			<input type="password" name="password_confirmation">
			<p class="error">Your passwords don't match</p>

			<p>Location</p>
			<input type="text" name="location" value="{{ old('location') }}">
			<p class="error">Your location is not valid</p>

			<div>
				<input type="submit" class="submit" value="create account">
			</div>

		</form>
	</section>
@stop