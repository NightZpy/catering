<?php

namespace App\Repositories;

use App\Models\Type;
use App\Repositories\MyBaseRepository;

class TypeRepository extends MyBaseRepository
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
        return Type::class;
    }
}
