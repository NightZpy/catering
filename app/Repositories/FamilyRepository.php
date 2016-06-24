<?php

namespace App\Repositories;

use App\Models\Family;
use InfyOm\Generator\Common\BaseRepository;

class FamilyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'input_material_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Family::class;
    }
}
