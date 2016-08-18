<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\BaseRecipe;
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
}
