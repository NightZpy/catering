<?php

namespace App\Repositories\Kitchen\recipe;

use App\Models\Kitchen\recipe\RecipeType;
use InfyOm\Generator\Common\BaseRepository;

class RecipeTypeRepository extends BaseRepository
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
