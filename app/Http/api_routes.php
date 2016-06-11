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