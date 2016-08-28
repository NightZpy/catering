<?php 
/* 
 * ------------------- Route prefix for kitchen module ---------------
 */
Route::group(['prefix' => 'kitchen'], function () {	
	/* 
	 * ------------------- Route index for Item ---------------
	 */	
	Route::group(['prefix' => 'items'], function() {
		Route::get('', [
			'as' => 'kitchen.items.index',
			'uses' => function() {
				return view('kitchen.items.index');
			}
		]);	

		Route::group(['prefix' => 'providers'], function() {
			Route::get('{item?}', [
				'as' => 'kitchen.items.providers.index',
				'uses' => function (App\Models\Kitchen\Item $item) {
					return view('kitchen.items.providers.index', compact('item'));
				}
			]);
		});
	});

	/* 
	 * ------------------- Route index for Provider ---------------
	 */
	Route::group(['prefix' => 'providers'], function() {
		Route::get('', [
			'as' => 'kitchen.providers.index',
			'uses' => function() {
				return view('kitchen.providers.index');
			}
		]);	
	});

	Route::group(['prefix' => 'utensils'], function() {
		/* 
		 * ------------------- Route index for UtensilCategory ---------------
		 */
		Route::get('categories', [
			'as' => 'kitchen.utensils.categories.index',
			'uses' => function() {
				return view('kitchen.utensils.categories.index');
			}
		]);	

		/* 
		 * ------------------- Route index for Utensil ---------------
		 */
		Route::get('', [
			'as' => 'kitchen.utensils.index',
			'uses' => function() {
				return view('kitchen.utensils.index');
			}
		]);		
	});

	Route::group(['prefix' => 'recipes'], function() {
		/* 
		 * ------------------- Route index for Recipe ---------------
		 */
		Route::get('', [
			'as' => 'kitchen.recipes.index',
			'uses' => function() {
				return view('kitchen.recipes.index');
			}
		]);	

		Route::get('base-recipes', [
			'as' => 'kitchen.recipes.base-recipes.index',
			'uses' => function() {
				return view('kitchen.recipes.base-recipes.index');
			}
		]);		

		Route::get('utensils', [
			'as' => 'kitchen.recipes.utensils.index',
			'uses' => function() {
				return view('kitchen.recipes.utensils.index');
			}
		]);	


		/* 
		 * ------------------- Route index for RecipeType ---------------
		 */
		Route::get('types', [
			'as' => 'kitchen.recipes.types.index',
			'uses' => function() {
				return view('kitchen.recipes.types.index');
			}
		]);

		/* 
		 * ------------------- Route index for BaseRecipe ---------------
		 */
		Route::group(['prefix' => 'bases'], function() {
			Route::get('', [
				'as' => 'kitchen.recipes.bases.index',
				'uses' => function() {
					return view('kitchen.recipes.bases.index');
				}
			]);		

			Route::get('items/{baseRecipe?}', [
				'as' => 'kitchen.recipes.bases.items.index',
				'uses' => function (App\Models\Kitchen\Recipe\BaseRecipe $baseRecipe) {
					return view('kitchen.recipes.bases.items.index', compact('baseRecipe'));
				}
			]);

			Route::get('utensils/{baseRecipe?}', [
				'as' => 'kitchen.recipes.bases.utensils.index',
				'uses' => function (App\Models\Kitchen\Recipe\BaseRecipe $baseRecipe) {
					return view('kitchen.recipes.bases.utensils.index', compact('baseRecipe'));
				}
			]);					
		});
	});
});