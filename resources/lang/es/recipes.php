<?php  
	return [
		'index' => [
			'main-title' => 'Recetas',
			'buttons' => [
				'add-new' => 'Añadir Nueva',
				'search' => 'Buscar',
				'reset' => 'Reiniciar',
				'simple' => 'Simple',
				'detail' => 'Detallado',
				'dropdown' => 'Desplegable', 
			],
			'labels' => [
				'pagination-style' => 'Estilo de paginación:',
				'items-per-page' => 'Artículos por página:',
				'name' => 'nombre'
			],
			'messages' => [
				'success' => 'Receta recuperada correctamente',
				'failed' => 'Receta no encontrada',
				'saved' => 'Receta agregada correctamente',
				'updated' => 'Receta actualizada correctamente', 
				'deleted' => 'Receta eliminada correctamente',
				'utensil-associated' => 'Utensilio asociado correctamente a la receta',
				'utensil-not-found' => 'No se encontro el Utensilio',
				'utensil-not-found' => 'No se encontro el Utensilio',
				'utensil-detached' => 'El utensilio se elimino de receta',
				'utensil-not-detached' => 'El utensilio no se pudo eliminar de BaseRecipe',
				'baseRecipe-failed' => 'No se encontro la receta base',
				'baseRecipe-success' => 'Receta base asociada correctamente a la receta',
				'baseRecipe-not-associted' => 'No existe la receta base para la receta',
				'baseRecipes-not-found' => 'No se encontro la receta base',
				'baseRecipe-retrieve' => 'Receta base encontrada',
				'baseRecipe-detached' => 'Receta base eliminada correctamente de la receta',
				'baseRecipe-not-detached' => 'No se pudo eliminada la receta base de la receta'

			],
		], 
		'show' => [
			'labels' => [
				'list' => 'Lista',
				'Utensils' => 'Utensilios',
				'Description' => 'Descripción',
				'Recipe' => 'Receta'			
			],
		],
		'template' => [
			'form-add-title' => 'Datos de la receta',
			'form-show-title' => 'Receta',
			'form-delete-title' => '¡Eliminar receta!',
		]
	];