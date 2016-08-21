<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Kitchen\Item;
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

    public function availableItems($id)
    {
        $itemsId = $this->findWithoutFail($id)->items->pluck('id');    
        return Item::whereNotIn('id', $itemsId)->get();
    }    
}
