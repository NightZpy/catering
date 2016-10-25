<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\Utensil;
use App\Repositories\MyBaseRepository;

class UtensilRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'stock',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Utensil::class;
    }
}
