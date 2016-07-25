<?php

namespace App\Repositories;

use InfyOm\Generator\Common\BaseRepository;

abstract class MyBaseRepository extends BaseRepository
{
    public function forSelect() {
        return $this->all()->pluck('name', 'id');
    }

    private function checkPivotAttributes($key, $attributes)
    {
        if (array_key_exists($key, $attributes) && count($attributes[$key]))
            return camel_case($key);
        return false;
    }

    public function updatePivot($model, $key, $attributes)
    {
        if (( $method = $this->checkPivotAttributes($key, $attributes) ))
            $model->$method()->sync($attributes[$key]);
        return $method;
    }    

    public function createPivot($model, $key, $attributes)
    {
        if (( $method = $this->checkPivotAttributes($key, $attributes) ))
            $model->$method()->attach($attributes[$key]);
        return $method;
    }      

    public function getNewCode()
    {       
        $data = $this->all();
        if($data->count())
            return intval($data->last()->code) + 1;
        return 1;
    }    
}