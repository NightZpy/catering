<?php

namespace App\Repositories;

use App\Models\SubFamily;

class SubFamilyRepository extends MyBaseRepository
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

    public function create(array $attributes)
    {
        if (!isset($attributes['code']))
            $attributes['code'] = $this->getNewCode();
        $item = parent::create($attributes);
        return $item;        
    }        
}
