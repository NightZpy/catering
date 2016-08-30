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

Route::get('/test', function(){
	return App\Models\Kitchen\Item::all()->toArray();
	return App\Models\Family::first()->input_material;
});

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Auth Include routes
|--------------------------------------------------------------------------
*/
require app_path('Http/Routes/Web/Auth.php');

/*
|--------------------------------------------------------------------------
| General Include routes
|--------------------------------------------------------------------------
*/
require app_path('Http/Routes/Web/General.php');

/*
|--------------------------------------------------------------------------
| Kitchen Include routes module
|--------------------------------------------------------------------------
*/
require app_path('Http/Routes/Web/Kitchen.php');

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});