<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/

/* 
 * ------------------- Route API CRUD for Provider ---------------
 */
Route::group(['prefix' => 'providers', 'namespace' => 'Kitchen'], function () {	
	Route::get('/', [
		'as' => 'api.v1.kitchen.providers.index',
		'uses' => 'ProviderAPIController@index'
	]);
	Route::get('show/{id?}', [
		'as' => 'api.v1.kitchen.providers.show',
		'uses' => 'ProviderAPIController@show'
	]);
	Route::patch('update/{id?}', [
		'as' => 'api.v1.kitchen.providers.update',
		'uses' => 'ProviderAPIController@update'
	]);
	Route::delete('delete/{id?}', [
		'as' => 'api.v1.kitchen.providers.delete',
		'uses' => 'ProviderAPIController@destroy'
	]);
	Route::post('store', [
		'as' => 'api.v1.kitchen.providers.store',
		'uses' => 'ProviderAPIController@store'
	]);
});

/* 
 * ------------------- Route API CRUD for Type ---------------
 */
Route::group(['prefix' => 'types'], function () {	
	Route::get('/', [
		'as' => 'api.v1.types.index',
		'uses' => 'TypeAPIController@index'
	]);
	Route::get('show/{id?}', [
		'as' => 'api.v1.types.show',
		'uses' => 'TypeAPIController@show'
	]);
	Route::patch('update/{id?}', [
		'as' => 'api.v1.types.update',
		'uses' => 'TypeAPIController@update'
	]);
	Route::delete('delete/{id?}', [
		'as' => 'api.v1.types.delete',
		'uses' => 'TypeAPIController@destroy'
	]);
	Route::post('store', [
		'as' => 'api.v1.types.store',
		'uses' => 'TypeAPIController@store'
	]);
});

/* 
 * ------------------- Route API CRUD for Presentation ---------------
 */
Route::group(['prefix' => 'presentations'], function () {	
	Route::get('/', [
		'as' => 'api.v1.presentations.index',
		'uses' => 'PresentationAPIController@index'
	]);
	Route::get('show/{id?}', [
		'as' => 'api.v1.presentations.show',
		'uses' => 'PresentationAPIController@show'
	]);
	Route::patch('update/{id?}', [
		'as' => 'api.v1.presentations.update',
		'uses' => 'PresentationAPIController@update'
	]);
	Route::delete('delete/{id?}', [
		'as' => 'api.v1.presentations.delete',
		'uses' => 'PresentationAPIController@destroy'
	]);
	Route::post('store', [
		'as' => 'api.v1.presentations.store',
		'uses' => 'PresentationAPIController@store'
	]);
});

/* 
 * ------------------- Route API CRUD for Unit ---------------
 */
Route::group(['prefix' => 'units'], function () {	
	Route::get('/', [
		'as' => 'api.v1.units.index',
		'uses' => 'UnitAPIController@index'
	]);
	Route::get('show/{id?}', [
		'as' => 'api.v1.units.show',
		'uses' => 'UnitAPIController@show'
	]);
	Route::patch('update/{id?}', [
		'as' => 'api.v1.units.update',
		'uses' => 'UnitAPIController@update'
	]);
	Route::delete('delete/{id?}', [
		'as' => 'api.v1.units.delete',
		'uses' => 'UnitAPIController@destroy'
	]);
	Route::post('store', [
		'as' => 'api.v1.units.store',
		'uses' => 'UnitAPIController@store'
	]);
});
