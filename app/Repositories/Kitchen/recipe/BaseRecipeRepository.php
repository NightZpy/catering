<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Item;
use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Kitchen\Utensil;
use App\Repositories\MyBaseRepository;

class BaseRecipeRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'quantity',
        'recipe_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BaseRecipe::class;
    }

    public function create(array $attributes)
    {
        if ( isset ( $attributes['pivot_utensil']['utensil_id'] ) && count ( $attributes['pivot_utensil']['utensil_id'] ) ) {
            $utensils = $attributes['pivot_utensil']['utensil_id'];
            unset ( $attributes['pivot_utensil'] );
        }
        $baseRecipe = parent::create($attributes);
        if ( isset ( $utensils ) ) 
            $baseRecipe->utensils()->attach($utensils);
        return $baseRecipe;
    }

    public function availableItems($id)
    {
        $itemsId = $this->findWithoutFail($id)->items->pluck('id');    
        return Item::whereNotIn('id', $itemsId)->get();
    }    

    public function availableUtensils($id)
    {
        $utensilsId = $this->findWithoutFail($id)->utensils->pluck('id');    
        return Utensil::whereNotIn('id', $utensilsId)->get();
    }    
}
