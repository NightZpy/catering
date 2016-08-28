<?php 
Route::group(['prefix' => 'general'], function () {	
	/* 
	 * ------------------- Route index for Type ---------------
	 */
	Route::get('types', [
		'as' => 'types.index',
		'uses' => function() {
			return view('types.index');
		}
	]);

	/* 
	 * ------------------- Route index for Presentation ---------------
	 */
	Route::get('presentations', [
		'as' => 'presentations.index',
		'uses' => function() {
			return view('presentations.index');
		}
	]);

	/* 
	 * ------------------- Route index for Unit ---------------
	 */
	Route::get('units', [
		'as' => 'units.index',
		'uses' => function() {
			return view('units.index');
		}
	]);


	/* 
	 * ------------------- Route index for InputMaterial ---------------
	 */
	Route::get('input-materials', [
		'as' => 'inputMaterials.index',
		'uses' => function() {
			return view('inputMaterials.index');
		}
	]);

	/* 
	 * ------------------- Route index for Family ---------------
	 */
	Route::get('families', [
		'as' => 'families.index',
		'uses' => function() {
			return view('families.index');
		}
	]);

	/* 
	 * ------------------- Route index for SubFamily ---------------
	 */
	Route::get('sub-families', [
		'as' => 'subFamilies.index',
		'uses' => function() {
			return view('subFamilies.index');
		}
	]);
});