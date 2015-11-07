@extends('layouts.master')

@section('content')
	<section class="content login">
	<h2>create account</h2>
		<form method="POST" action="/auth/register">

			{!! csrf_field() !!}

			<p>Name</p>
			<input type="text" name="name" value="{{ old('name') }}">
			<p class="error">{{ $errors->first('name') }}</p>

			<p>Email</p>
			<input type="email" name="email" value="{{ old('email') }}">
			<p class="error">{{ $errors->first('email') }}</p>

			<p>Password</p>
			<input type="password" name="password">
			<p class="error">{{ $errors->first('password') }}</p>

			<p>Confirm Password</p>
			<input type="password" name="password_confirmation">
			<p class="error">{{ $errors->first('password_confirmation') }}</p>

			<p>Location</p>
			<input type="text" name="location" value="{{ old('location') }}">
			<p class="error">{{ $errors->first('location') }}</p>

			<div>
				<input type="submit" class="submit" value="create account">
			</div>

		</form>
	</section>
@stop