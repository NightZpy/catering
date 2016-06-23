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
    public function setCodeAttribute($value)
    {
        $size = strlen($value);
        if ($size == 1)
            $code = '00' . $value;
        elseif ($size == 2)
            $code = '0' . $value;
        else
            $code = $this->code;
        $this->attributes['code'] = $code;
    }      
}
