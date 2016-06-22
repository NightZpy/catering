<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 * @package App\Models
 */
class Unit extends Model
{
    use SoftDeletes;

    public $table = 'units';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'symbol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'symbol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:units',
        'symbol' => 'min:1|max:128|unique:units'
    ];
}
