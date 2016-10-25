<?php

namespace App\Repositories;

use App\Models\Presentation;
use App\Repositories\MyBaseRepository;

class PresentationRepository extends MyBaseRepository
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
        return Presentation::class;
    }
}
