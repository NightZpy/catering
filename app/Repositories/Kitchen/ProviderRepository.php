<?php

namespace App\Repositories\Kitchen;

use App\Models\Kitchen\Provider;
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
}
