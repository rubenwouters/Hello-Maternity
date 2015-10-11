<?php

Route::get('/', function () {
    return view('home');
});

// MIDDLEWARE
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'DashboardController@index');
});

// LOGIN
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// REGISTER
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');