<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\Recipe;
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

    public function availableUtensils($id)
    {
        $utensilsId = $this->findWithoutFail($id)->utensils->pluck('id');    
        return Utensil::whereNotIn('id', $utensilsId)->get();
    }     
}
