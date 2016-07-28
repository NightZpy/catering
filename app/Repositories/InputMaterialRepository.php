<?php

namespace App\Repositories;

use App\Models\InputMaterial;
use InfyOm\Generator\Common\BaseRepository;

class InputMaterialRepository extends BaseRepository
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
        return InputMaterial::class;
    }
}
