<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\UtensilCategory;
use App\Repositories\MyBaseRepository;

class UtensilCategoryRepository extends MyBaseRepository
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
