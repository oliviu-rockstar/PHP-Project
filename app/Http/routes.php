<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['prefix'=> 'v1'], function(){

	// Obtain Oauth Token
	Route::post('oauth/token', 'Api\v1\AuthController@getToken');

	// SignUp
	Route::post('auth/signup', 'Api\v1\AuthController@signUp');

	// SignIn
	Route::post('auth/signin', 'Api\v1\AuthController@signIn');

	// Listing Resource
	Route::resource('listing', 'Api\v1\ListingController', ['except'=> ['create', 'edit']]);

	// User Resource
	Route::resource('user', 'Api\v1\UserController', ['except'=> ['create', 'edit', 'store']]);

	//Category Resource
	Route::resource('category', 'Api\v1\CategoryController', ['except'=> ['create', 'edit']]);

	//Tag Rsource
	Route::resource('tag', 'Api\v1\TagController', ['except'=> ['create', 'edit']]);

	Route::post('listing/tags', 'Api\v1\TagController@syncTagsForListing');

	//Asset Resource
	Route::resource('asset', 'Api\v1\AssetController', ['except'=> ['create', 'edit']]);

	// Get all parent categories
	Route::get('categories', 'Api\v1\CategoryController@getParentCategories');

	// Get all categories with subcategories
	Route::get('categories/all', 'Api\v1\CategoryController@getCatAndSubCats');

	Route::get('category/{id}/listing', 'Api\v1\CategoryController@getCategoryListings');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);