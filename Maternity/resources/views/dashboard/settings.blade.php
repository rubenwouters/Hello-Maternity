@extends('layouts.master')

@section('content')
	<section class="content back">
		<a href="/dashboard">back</a>
	</section>

	<section class="content login">
		<h2>Profile settings</h2>

		{!! Form::open(array('action' => array('DashboardController@postSettings', $user->id))) !!}

		    {!! csrf_field() !!}

		        <p>Name</p>
		        <input type="text" name="name" value="{{ isset($user)? $user->name: '' }}">

		        <p>Email</p>
		        <input type="email" name="email" value="{{ isset($user)? $user->email: '' }}">

		        <p>Location</p>
		        <input type="text" name="location" value="{{ isset($user)? $user->location: '' }}">
			

		    <div>
		        <input type="submit" class="submit" value="update profile">

		    </div>
		{!! Form::close() !!}

		<h2>Upload profile picture</h2>

		{!! Form::open(array('action' => array('DashboardController@uploadProfilePic', $user->id), 'files' => true)) !!}

		    {!! csrf_field() !!}

				<p>Profile Image</p>
				{!! Form::file('profilePic') !!}
				
				@if( isset($user->picture) && $user->picture != null )
					<p>Current profile picture</p>
					{!! Html::image('profile_pictures/' . $user->picture, 'profile picture') !!}
				@endif

		    <div>
		        <input type="submit" class="submit" value="upload picture">

		    </div>
		{!! Form::close() !!}

		<h2>Password settings</h2>

		{!! Form::open(array('action' => array('DashboardController@changePassword', $user->id))) !!}

		    {!! csrf_field() !!}

		        <p>Password</p>
		        <input type="password" name="password">

		        <p>Confirm Password</p>
		        <input type="password" name="password_confirmation">

		    <div>
		        <input type="submit" class="submit" value="update password">

		    </div>
		{!! Form::close() !!}
	</section>
@stop