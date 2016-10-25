<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\RecipeType;
use App\Repositories\MyBaseRepository;

class RecipeTypeRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RecipeType::class;
    }
}
