<?php

// BASIC ROUTES
Route::get('/', 'HomeController@index');
Route::get('/product/view/{id}', 'HomeController@productInfo');
Route::post('/search', 'SearchController@search');

// AUTHENTICATED USERS
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'DashboardController@index');

	// ACCOUNT SETTINGS
	Route::get('/settings', 'DashboardController@settings');
	Route::post('/settings/updateProfile/{id}', 'DashboardController@postSettings');
	Route::post('/settings/changePassword/{id}', 'DashboardController@changePassword');
	Route::post('/settings/uploadProfilePic/{id}', 'DashboardController@uploadProfilePic');

	// CLOTHES CRUD
	Route::get('/dashboard/clothes/add', 'ClothesController@addClothes');
	Route::post('/dashboard/clothes/save', 'ClothesController@saveClothes');
	Route::get('/dashboard/clothes/edit/{id}', 'ClothesController@edit');
	Route::get('/dashboard/clothes/delete/{id}', 'ClothesController@delete');
	Route::post('/dashboard/clothes/update/{id}', 'ClothesController@updateClothes');
	Route::get('/dashboard/history/clear', 'ClothesController@deleteHistory');

	// BAG CRUD
	Route::get('/bag', 'BagController@index');
	Route::get('/bag/add/{id}', 'BagController@add');
	Route::get('/bag/remove/{id}', 'BagController@remove');
	Route::get('/bag/checkout', 'BagController@checkout');

	// HEART BAG
	Route::get('/heartbag', 'HeartBagController@index');
	Route::get('/heartbag/add/{id}', 'HeartBagController@add');
	Route::get('/heartbag/remove/{id}', 'HeartBagController@delete');
	Route::get('/heartbag/tobag/{id}', 'HeartBagController@toBag');
});

// LOGIN
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// REGISTER
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');