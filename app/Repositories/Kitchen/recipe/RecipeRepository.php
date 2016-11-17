<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\Recipe;
use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Kitchen\Utensil;
use App\Repositories\MyBaseRepository;

class RecipeRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'servings_quantity',
        'type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Recipe::class;
    }

    public function create(array $attributes)
    {
        $utensils = array_filter($attributes['pivot_utensil']['utensil_id']);
        unset($attributes['pivot_utensil']['utensil_id']);
        $attributes['pivot_utensil']['utensil_id'] = $utensils;

        if ( isset ( $attributes['pivot_utensil']['utensil_id'] ) && count ( $attributes['pivot_utensil']['utensil_id'] ) ) {
            $utensils = $attributes['pivot_utensil']['utensil_id'];
            unset ( $attributes['pivot_utensil'] );
        }
        $recipe = parent::create($attributes);
        if ( isset ( $utensils ) ) 
            $recipe->utensils()->attach($utensils);
        return $recipe;
    }

    public function update(array $attributes, $id)
    {
        if ( isset ( $attributes['pivot_utensil']['utensil_id'] ) && count ( $attributes['pivot_utensil']['utensil_id'] ) ) {
            $utensils = $attributes['pivot_utensil']['utensil_id'];
            unset ( $attributes['pivot_utensil'] );
        }
        $recipe = parent::update($attributes, $id);
        if ( isset ( $utensils ) ) 
            $recipe->utensils()->sync($utensils);
        return $recipe;
    }        

    public function availableUtensils($id)
    {
        $utensilsId = $this->findWithoutFail($id)->utensils->pluck('id');    
        return Utensil::whereNotIn('id', $utensilsId)->get();
    }   

    public function availableBases($id)
    {
        $basesId = $this->findWithoutFail($id)->bases->pluck('id');    
        return BaseRecipe::whereNotIn('id', $basesId)->get();
    }      
}
