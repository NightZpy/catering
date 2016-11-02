<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\Provider;
use App\Models\Kitchen\Item;
use InfyOm\Generator\Common\BaseRepository;

class ProviderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'specialty',
        'district',
        'contact',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Provider::class;
    }

    /**
    * Overwrite methods
    */
    public function create(array $attributes)
    {        
        $provider = parent::create($attributes);
        //$this->createPivot($provider, 'items', $attributes);        
        return $provider;
    }

    public function update(array $attributes, $id)
    {
        //$provider = $this->findWithoutFail($id);
        $provider = parent::update($attributes, $id);
        //$this->updatePivot($provider, 'items', $attributes);
        return $provider;        
    }    

    public function availableItems($id)
    {
        $itemsId = $this->findWithoutFail($id)->items->pluck('id');    
        return Item::whereNotIn('id', $itemsId)->get();
    }    
}
