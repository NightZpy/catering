<?php

namespace App\Models\Kitchen;

use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Kitchen\Recipe\Recipe;
use Illuminate\Database\Eloquent\Relations\Pivot;
 
class BaseRecipeRecipePivot extends Pivot {
	// let's use date mutator for a field
	
	protected $appends = [
        'ration_weight',
        'ration_weight_format',
        'cost',
        'cost_format',
        'ration_cost',
        'ration_cost_format',
	];

    public function base()
    {
        return $this->hasOne(BaseRecipe::class, 'id', 'base_id')->whereId($this->base_id);
    }

    public function recipe()
    {
        return $this->hasOne(Recipe::class, 'id', 'recipe_id');//->whereId($this->recipe_id);
    }

    /*    
        Suma de los pesos de los insumos de cada receta aplicando Merma (peso a utilizar) / las raciones de la receta base * la raciones de la receta final
        ='Recetas Base'!K6:K7/'Recetas Base'!L2*J2
     */
    public function getRationWeightAttribute()
    {        
        $base = BaseRecipe::findOrFail($this->base_id);

        if ( !$base )     
            return 0;
        
        $servingQuantity = $base->serving_quantity_items;
        $baseServingQuantity = $base->servings_quantity;
        $recipeServingQuantity = Recipe::findOrFail($this->recipe_id)->servings_quantity;
        
        if ( $servingQuantity == 0 || $baseServingQuantity == 0 || $recipeServingQuantity == 0 )
            return 0;                    

        return $servingQuantity / $baseServingQuantity * $recipeServingQuantity;
    }

    public function getRationWeightFormatAttribute()
    {
        return number_format($this->ration_weight, 2, ',', '.');
    }

    /*
    *   = Costo MP X Racion de Receta BAse
    */
    public function getRationCostAttribute()
    {
        if ($this->base)
            return $this->base->cost_mp_x_ration;
        return 0;
    }

    public function getRationCostFormatAttribute()
    {
        return number_format($this->ration_cost, 2, ',', '.');
    }    
     

    public function getCostAttribute()
    {
        return $this->required_quantity * $this->ration_cost;
    }   

    public function getCostFormatAttribute()
    {
        return number_format($this->cost, 2, ',', '.');
    }   

}