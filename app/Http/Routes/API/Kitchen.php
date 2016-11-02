<?php 
/* 
 * ------------------- Route API CRUD for Kitchen ---------------
 */
Route::group(['prefix' => 'kitchen', 'namespace' => 'Kitchen'], function () {
	/* 
	 * ------------------- Route API CRUD for Provider ---------------
	 */
	Route::group(['prefix' => 'providers'], function () {	
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

		Route::get('available-list/{id?}', [
			'as' => 'api.v1.kitchen.providers.items.available',
			'uses' => 'ProviderAPIController@availableItems'
		]);

	});	

	Route::group(['prefix' => 'items'], function () {
		Route::get('/', [
			'as' => 'api.v1.kitchen.items.index',
			'uses' => 'ItemAPIController@index'
		]);
		Route::get('show/{id?}', [
			'as' => 'api.v1.kitchen.items.show',
			'uses' => 'ItemAPIController@show'
		]);
		Route::patch('update/{id?}', [
			'as' => 'api.v1.kitchen.items.update',
			'uses' => 'ItemAPIController@update'
		]);
		Route::delete('delete/{id?}', [
			'as' => 'api.v1.kitchen.items.delete',
			'uses' => 'ItemAPIController@destroy'
		]);
		Route::post('store', [
			'as' => 'api.v1.kitchen.items.store',
			'uses' => 'ItemAPIController@store'
		]);	

		Route::get('unique/{name?}', [
			'as' => 'api.v1.kitchen.items.unique',
			'uses' => 'ItemAPIController@unique'
		]);

		Route::group(['prefix' => 'providers'], function () {	
			Route::get('{id?}', [
				'as' => 'api.v1.kitchen.items.providers.index',
				'uses' => 'ItemAPIController@providers'
			]);
			Route::get('available-list/{id?}', [
				'as' => 'api.v1.kitchen.items.providers.available-providers',
				'uses' => 'ItemAPIController@availableProviders'
			]);
			Route::get('available/{id?}', [
				'as' => 'api.v1.kitchen.items.providers.available',
				'uses' => 'ItemAPIController@hasAvailableProviders'
			]);
			Route::get('show/{id?}/{providerId?}', [
				'as' => 'api.v1.kitchen.items.providers.show',
				'uses' => 'ItemAPIController@provider'
			]);
			Route::get('exists/{id?}/{providerId?}', [
				'as' => 'api.v1.kitchen.items.providers.already-associate',
				'uses' => 'ItemAPIController@alreadyAssociate'
			]);		
			Route::patch('{id?}/{providerId?}', [
				'as' => 'api.v1.kitchen.items.providers.store',
				'uses' => 'ItemAPIController@storeProvider'
			]);	
			Route::delete('{id?}/{providerId?}', [
				'as' => 'api.v1.kitchen.items.providers.delete',
				'uses' => 'ItemAPIController@deleteProvider'
			]);		
		});
	});

	/* 
	 * ------------------- Route API CRUD for UtensilCategory ---------------
	 */
	Route::group(['prefix' => 'utensils'], function () {	
		Route::group(['prefix' => 'categories'], function () {	
			Route::get('/', [
				'as' => 'api.v1.kitchen.utensils.categories.index',
				'uses' => 'UtensilCategoryAPIController@index'
			]);
			Route::get('show/{id?}', [
				'as' => 'api.v1.kitchen.utensils.categories.show',
				'uses' => 'UtensilCategoryAPIController@show'
			]);
			Route::patch('update/{id?}', [
				'as' => 'api.v1.kitchen.utensils.categories.update',
				'uses' => 'UtensilCategoryAPIController@update'
			]);
			Route::delete('delete/{id?}', [
				'as' => 'api.v1.kitchen.utensils.categories.delete',
				'uses' => 'UtensilCategoryAPIController@destroy'
			]);
			Route::post('store', [
				'as' => 'api.v1.kitchen.utensils.categories.store',
				'uses' => 'UtensilCategoryAPIController@store'
			]);
			Route::get('select-list', [
				'as' => 'api.v1.kitchen.utensils.categories.select-list',
				'uses' => 'UtensilCategoryAPIController@selectList'
			]);
		});	

		/* 
		 * ------------------- Route API CRUD for Utensil ---------------
		 */
		Route::get('/', [
			'as' => 'api.v1.kitchen.utensils.index',
			'uses' => 'UtensilAPIController@index'
		]);
		Route::get('show/{id?}', [
			'as' => 'api.v1.kitchen.utensils.show',
			'uses' => 'UtensilAPIController@show'
		]);
		Route::patch('update/{id?}', [
			'as' => 'api.v1.kitchen.utensils.update',
			'uses' => 'UtensilAPIController@update'
		]);
		Route::delete('delete/{id?}', [
			'as' => 'api.v1.kitchen.utensils.delete',
			'uses' => 'UtensilAPIController@destroy'
		]);
		Route::post('store', [
			'as' => 'api.v1.kitchen.utensils.store',
			'uses' => 'UtensilAPIController@store'
		]);	
		Route::get('select-list', [
				'as' => 'api.v1.kitchen.utensils.select-list',
				'uses' => 'UtensilAPIController@selectList'
			]);
	});

	Route::group(['prefix' => 'recipes', 'namespace' => 'Recipe'], function () {
		/* 
		 * ------------------- Route API CRUD for Recipe ---------------
		 */
		Route::get('/', [
			'as' => 'api.v1.kitchen.recipes.index',
			'uses' => 'RecipeAPIController@index'
		]);
		Route::get('show/{id?}', [
			'as' => 'api.v1.kitchen.recipes.show',
			'uses' => 'RecipeAPIController@show'
		]);
		Route::patch('update/{id?}', [
			'as' => 'api.v1.kitchen.recipes.update',
			'uses' => 'RecipeAPIController@update'
		]);
		Route::delete('delete/{id?}', [
			'as' => 'api.v1.kitchen.recipes.delete',
			'uses' => 'RecipeAPIController@destroy'
		]);
		Route::post('store', [
			'as' => 'api.v1.kitchen.recipes.store',
			'uses' => 'RecipeAPIController@store'
		]);

		Route::group(['prefix' => 'base-recipes'], function () {	
			Route::get('{id?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.index',
				'uses' => 'RecipeAPIController@bases'
			]);
			Route::get('available-list/{id?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.available',
				'uses' => 'RecipeAPIController@availableBases'
			]);
			Route::get('available/{id?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.has-available',
				'uses' => 'RecipeAPIController@hasAvailableBases'
			]);
			Route::get('show/{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.show',
				'uses' => 'RecipeAPIController@base'
			]);
			Route::get('exists/{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.already-associate',
				'uses' => 'RecipeAPIController@alreadyAssociateBase'
			]);		
			Route::patch('{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.store',
				'uses' => 'RecipeAPIController@storeBase'
			]);	
			Route::delete('{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.base-recipes.delete',
				'uses' => 'RecipeAPIController@deleteBase'
			]);		
		});			

		Route::group(['prefix' => 'utensils'], function () {	
			Route::get('{id?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.index',
				'uses' => 'RecipeAPIController@utensils'
			]);
			Route::get('available-list/{id?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.available',
				'uses' => 'RecipeAPIController@availableUtensils'
			]);
			Route::get('available/{id?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.has-available',
				'uses' => 'RecipeAPIController@hasAvailableUtensils'
			]);
			Route::get('show/{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.show',
				'uses' => 'RecipeAPIController@utensil'
			]);
			Route::get('exists/{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.already-associate',
				'uses' => 'RecipeAPIController@alreadyAssociateUtensil'
			]);		
			Route::patch('{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.store',
				'uses' => 'RecipeAPIController@storeUtensil'
			]);	
			Route::delete('{id?}/{baseId?}', [
				'as' => 'api.v1.kitchen.recipes.utensils.delete',
				'uses' => 'RecipeAPIController@deleteUtensil'
			]);		
		});			

		/* 
		 * ------------------- Route API CRUD for RecipeType ---------------
		 */
		Route::group(['prefix' => 'types'], function () {	
			Route::get('/', [
				'as' => 'api.v1.kitchen.recipes.types.index',
				'uses' => 'RecipeTypeAPIController@index'
			]);
			Route::get('show/{id?}', [
				'as' => 'api.v1.kitchen.recipes.types.show',
				'uses' => 'RecipeTypeAPIController@show'
			]);
			Route::patch('update/{id?}', [
				'as' => 'api.v1.kitchen.recipes.types.update',
				'uses' => 'RecipeTypeAPIController@update'
			]);
			Route::delete('delete/{id?}', [
				'as' => 'api.v1.kitchen.recipes.types.delete',
				'uses' => 'RecipeTypeAPIController@destroy'
			]);
			Route::post('store', [
				'as' => 'api.v1.kitchen.recipes.types.store',
				'uses' => 'RecipeTypeAPIController@store'
			]);
			Route::get('select-list', [
				'as' => 'api.v1.kitchen.recipes.types.select-list',
				'uses' => 'RecipeTypeAPIController@selectList'
			]);
		});

		/* 
		 * ------------------- Route API CRUD for BaseRecipe ---------------
		 */
		Route::group(['prefix' => 'bases'], function () {	
			Route::get('/', [
				'as' => 'api.v1.kitchen.recipes.bases.index',
				'uses' => 'BaseRecipeAPIController@index'
			]);
			Route::get('show/{id?}', [
				'as' => 'api.v1.kitchen.recipes.bases.show',
				'uses' => 'BaseRecipeAPIController@show'
			]);
			Route::patch('update/{id?}', [
				'as' => 'api.v1.kitchen.recipes.bases.update',
				'uses' => 'BaseRecipeAPIController@update'
			]);
			Route::delete('delete/{id?}', [
				'as' => 'api.v1.kitchen.recipes.bases.delete',
				'uses' => 'BaseRecipeAPIController@destroy'
			]);
			Route::post('store', [
				'as' => 'api.v1.kitchen.recipes.bases.store',
				'uses' => 'BaseRecipeAPIController@store'
			]);
			Route::get('select-list', [
				'as' => 'api.v1.kitchen.recipes.bases.select-list',
				'uses' => 'BaseRecipeAPIController@selectList'
			]);

			Route::group(['prefix' => 'items'], function () {	
				Route::get('{id?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.index',
					'uses' => 'BaseRecipeAPIController@items'
				]);
				Route::get('available-list/{id?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.available',
					'uses' => 'BaseRecipeAPIController@availableItems'
				]);
				Route::get('available/{id?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.has-available',
					'uses' => 'BaseRecipeAPIController@hasAvailableItems'
				]);
				Route::get('show/{id?}/{itemId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.show',
					'uses' => 'BaseRecipeAPIController@item'
				]);
				Route::get('exists/{id?}/{itemId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.already-associate',
					'uses' => 'BaseRecipeAPIController@alreadyAssociateItem'
				]);		
				Route::patch('{id?}/{itemId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.store',
					'uses' => 'BaseRecipeAPIController@storeItem'
				]);	
				Route::delete('{id?}/{itemId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.items.delete',
					'uses' => 'BaseRecipeAPIController@deleteItem'
				]);		
			});			

			Route::group(['prefix' => 'utensils'], function () {	
				Route::get('{id?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.index',
					'uses' => 'BaseRecipeAPIController@utensils'
				]);
				Route::get('available-list/{id?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.available',
					'uses' => 'BaseRecipeAPIController@availableUtensils'
				]);
				Route::get('available/{id?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.has-available',
					'uses' => 'BaseRecipeAPIController@hasAvailableUtensils'
				]);
				Route::get('show/{id?}/{baseId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.show',
					'uses' => 'BaseRecipeAPIController@utensil'
				]);
				Route::get('exists/{id?}/{baseId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.already-associate',
					'uses' => 'BaseRecipeAPIController@alreadyAssociateUtensil'
				]);		
				Route::patch('{id?}/{baseId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.store',
					'uses' => 'BaseRecipeAPIController@storeUtensil'
				]);	
				Route::delete('{id?}/{baseId?}', [
					'as' => 'api.v1.kitchen.recipes.bases.utensils.delete',
					'uses' => 'BaseRecipeAPIController@deleteUtensil'
				]);		
			});	

		});
	});
});