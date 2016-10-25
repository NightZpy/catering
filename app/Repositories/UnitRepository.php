<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\MyBaseRepository;

class UnitRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'symbol'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Unit::class;
    }
}
