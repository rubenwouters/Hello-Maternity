@extends('layouts.master')

@section('content')

	<section class="content login">
	<h2>account settings</h2>

		{!! Form::open(array('action' => array('DashboardController@postSettings', $user->id))) !!}

		    {!! csrf_field() !!}

		        <p>Name</p>
		        <input type="text" name="name" value="{{ isset($user)? $user->name: '' }}">

		        <p>Email</p>
		        <input type="email" name="email" value="{{ isset($user)? $user->email: '' }}">

		        <p>Password</p>
		        <input type="password" name="password">

		        <p>Confirm Password</p>
		        <input type="password" name="password_confirmation">
	
		        <p>Location</p>
		        <input type="text" name="location" value="{{ isset($user)? $user->location: '' }}">
				
				<p>Profile Image</p>
				{!! Form::file('image') !!}
				
				@if( isset($user->picture) && $user->picture != null )
					<p>Current profile picture</p>
				@endif


		    <div>
		        <input type="submit" class="submit" value="save changes">
		    </div>
		{!! Form::close() !!}
	</section>
@stop