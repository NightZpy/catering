<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\Item;
use App\Repositories\MyBaseRepository;

class ItemRepository extends MyBaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'auto_provider',
        'perishable',
        'currency',
        'unit_id',
        'presentation_id',
        'type_id',
        'sub_family_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Item::class;
    }

    public function create(array $attributes)
    {
        if (!isset($attributes['code']) || empty($attributes['code']))
            $attributes['code'] = $this->getNewCode();
        $item = parent::create($attributes);
        return $item;        
    }    
}
