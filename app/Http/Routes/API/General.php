<?php 
Route::group(['prefix' => 'general'], function () {	
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
		Route::get('select-list', [
			'as' => 'api.v1.types.select-list',
			'uses' => 'TypeAPIController@selectList'
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
		Route::get('select-list', [
			'as' => 'api.v1.presentations.select-list',
			'uses' => 'PresentationAPIController@selectList'
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

		Route::get('select-list', [
			'as' => 'api.v1.units.select-list',
			'uses' => 'UnitAPIController@selectList'
		]);	
	});



	/* 
	 * ------------------- Route API CRUD for InputMaterial ---------------
	 */
	Route::group(['prefix' => 'inputMaterials'], function () {	
		Route::get('/', [
			'as' => 'api.v1.inputMaterials.index',
			'uses' => 'InputMaterialAPIController@index'
		]);

		Route::get('/basic', [
			'as' => 'api.v1.inputMaterials.basic',
			'uses' => 'InputMaterialAPIController@basic'
		]);

		Route::get('show/{id?}', [
			'as' => 'api.v1.inputMaterials.show',
			'uses' => 'InputMaterialAPIController@show'
		]);
		Route::patch('update/{id?}', [
			'as' => 'api.v1.inputMaterials.update',
			'uses' => 'InputMaterialAPIController@update'
		]);
		Route::delete('delete/{id?}', [
			'as' => 'api.v1.inputMaterials.delete',
			'uses' => 'InputMaterialAPIController@destroy'
		]);
		Route::post('store', [
			'as' => 'api.v1.inputMaterials.store',
			'uses' => 'InputMaterialAPIController@store'
		]);
	});

	/* 
	 * ------------------- Route API CRUD for Family ---------------
	 */
	Route::group(['prefix' => 'families'], function () {	
		Route::get('/', [
			'as' => 'api.v1.families.index',
			'uses' => 'FamilyAPIController@index'
		]);
		Route::get('show/{id?}', [
			'as' => 'api.v1.families.show',
			'uses' => 'FamilyAPIController@show'
		]);
		Route::patch('update/{id?}', [
			'as' => 'api.v1.families.update',
			'uses' => 'FamilyAPIController@update'
		]);
		Route::delete('delete/{id?}', [
			'as' => 'api.v1.families.delete',
			'uses' => 'FamilyAPIController@destroy'
		]);
		Route::post('store', [
			'as' => 'api.v1.families.store',
			'uses' => 'FamilyAPIController@store'
		]);

		Route::get('check-unique/{field}/{value?}', [
			'as' => 'api.v1.families.check-unique',
			'uses' => 'FamilyAPIController@checkUnique'
		]);

		Route::get('select-list', [
			'as' => 'api.v1.families.select-list',
			'uses' => 'FamilyAPIController@selectList'
		]);	
	});

	/* 
	 * ------------------- Route API CRUD for SubFamily ---------------
	 */
	Route::group(['prefix' => 'sub-families'], function () {	
		Route::get('/', [
			'as' => 'api.v1.subFamilies.index',
			'uses' => 'SubFamilyAPIController@index'
		]);
		Route::get('show/{id?}', [
			'as' => 'api.v1.subFamilies.show',
			'uses' => 'SubFamilyAPIController@show'
		]);
		Route::patch('update/{id?}', [
			'as' => 'api.v1.subFamilies.update',
			'uses' => 'SubFamilyAPIController@update'
		]);
		Route::delete('delete/{id?}', [
			'as' => 'api.v1.subFamilies.delete',
			'uses' => 'SubFamilyAPIController@destroy'
		]);
		Route::post('store', [
			'as' => 'api.v1.subFamilies.store',
			'uses' => 'SubFamilyAPIController@store'
		]);

		Route::get('by-family/{familyId?}', [
			'as' => 'api.v1.subFamilies.byFamily',
			'uses' => 'SubFamilyAPIController@byFamily'
		]);	
	});
});