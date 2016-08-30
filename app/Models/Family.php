<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Family
 
 * @package App\Models
 */
class Family extends Model
{
    use SoftDeletes;

    public $table = 'families';

    protected $dates = ['deleted_at'];

    protected $appends = [
        'code'
    ];   

    public $fillable = [
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:families',
    ];

    /**
     *
     *-------------------- Relations
     *
     */
    public function subFamilies()
    {
        return $this->hasMany(SubFamily::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */

    public function getCodeAttribute()
    {
        $code = $this->id;
        if ($code < 10)
            $code = '0' . $code;        
        
        return $code;
    }      
}
