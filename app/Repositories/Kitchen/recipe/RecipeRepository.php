<?php

namespace App\Repositories\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\Recipe;
use InfyOm\Generator\Common\BaseRepository;

class RecipeRepository extends BaseRepository
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
}
