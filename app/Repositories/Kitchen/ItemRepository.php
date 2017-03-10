<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\Item;
use App\Models\Kitchen\Provider;
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

        if (isset($attributes['selected_providers']) && count($attributes['selected_providers']) > 0) {
            
            foreach ($attributes['selected_providers']  as $provider) {
                $item->providers()->attach($provider['provider_id'], $provider);            
            }            
        }

        return $item;        
    }    

    public function availableProviders($id)
    {
        return Provider::all();
        //$providersId = $this->findWithoutFail($id)->providers->pluck('id');    
        //return Provider::whereNotIn('id', $providersId)->get();
    }    
}
