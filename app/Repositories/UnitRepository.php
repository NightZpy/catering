<?php

namespace App\Repositories;

use App\Models\Unit;
use InfyOm\Generator\Common\BaseRepository;

class UnitRepository extends BaseRepository
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
