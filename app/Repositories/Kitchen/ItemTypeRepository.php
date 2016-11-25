<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\ItemType;
use App\Repositories\MyBaseRepository;

class ItemTypeRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ItemType::class;
    }    
}
