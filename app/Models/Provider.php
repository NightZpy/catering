<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider
 * @package App\Models
 */
class Provider extends Model
{
    use SoftDeletes;

    public $table = 'providers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'name',
        'specialty',
        'district',
        'address',
        'phone',
        'movil1',
        'movil2',
        'contact',
        'email',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'specialty' => 'string',
        'district' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'movil1' => 'string',
        'movil2' => 'string',
        'contact' => 'string',
        'email' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
