<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\Utensil;
use InfyOm\Generator\Common\BaseRepository;

class UtensilRepository extends BaseRepository
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
