<?php

namespace App\Repositories;

use App\Models\Presentation;
use InfyOm\Generator\Common\BaseRepository;

class PresentationRepository extends BaseRepository
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
