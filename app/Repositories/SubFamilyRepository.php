<?php

namespace App\Repositories;

use App\Models\SubFamily;
use InfyOm\Generator\Common\BaseRepository;

class SubFamilyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubFamily::class;
    }
}
