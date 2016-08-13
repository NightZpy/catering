<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\UtensilCategory;
use InfyOm\Generator\Common\BaseRepository;

class UtensilCategoryRepository extends BaseRepository
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
        return UtensilCategory::class;
    }
}
