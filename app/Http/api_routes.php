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
Route::group(['prefix' => 'providers'], function () {	
	Route::get('/', [
		'as' => 'api.v1.providers.index',
		'uses' => 'ProviderAPIController@index'
	]);
	Route::get('show/{id?}', [
		'as' => 'api.v1.providers.show',
		'uses' => 'ProviderAPIController@show'
	]);
	Route::patch('update/{id?}', [
		'as' => 'api.v1.providers.update',
		'uses' => 'ProviderAPIController@update'
	]);
	Route::delete('delete/{id?}', [
		'as' => 'api.v1.providers.delete',
		'uses' => 'ProviderAPIController@destroy'
	]);
	Route::post('store', [
		'as' => 'api.v1.providers.store',
		'uses' => 'ProviderAPIController@store'
	]);
});