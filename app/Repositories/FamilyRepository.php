<?php

namespace App\Repositories;

use App\Models\Family;

class FamilyRepository extends MyBaseRepository
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

    public function create(array $attributes)
    {
        if (!isset($attributes['code']))
            $attributes['code'] = $this->getNewCode();
        $item = parent::create($attributes);
        return $item;        
    }        
}
