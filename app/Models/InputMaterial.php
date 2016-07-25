<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InputMaterial
 * @package App\Models
 */
class InputMaterial extends Model
{
    use SoftDeletes;

    public $table = 'input_materials';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:input_materials',
        'code' => 'required|min:1|max:10|unique:input_materials'
    ];

    /**
     * Mutators
     */
    public function getCodeAttribute()
    {
        $code = $this->attributes['code'];
        if ($code < 10)
            $code = '00' . $code;
        elseif ($code < 100) 
            $code = '0' . $code;        
        return $code;
    }  
}
