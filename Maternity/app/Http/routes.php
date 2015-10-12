<?php

Route::get('/', function () {
    return view('home');
});

// MIDDLEWARE
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'DashboardController@index');

	// ACCOUNT SETTINGS
	Route::get('/settings', 'DashboardController@settings');
	Route::post('/settings/{id}', 'DashboardController@postSettings');

	// CLOTHES MANAGER
	Route::get('/dashboard/clothes/add', 'ClothesController@addClothes');
	Route::post('/dashboard/clothes/save', 'ClothesController@saveClothes');
});

// LOGIN
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// REGISTER
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');