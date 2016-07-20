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

    protected $appends = ['input_material_name'];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'code',
        'input_material_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'input_material_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:families',
        'code' => 'required|min:1|max:10|unique:families',
        'input_material_id' => 'required'
    ];

    /**
     *
     *-------------------- Relations
     *
     */
    public function inputMaterial()
    {
        return $this->belongsTo(InputMaterial::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    public function getInputMaterialNameAttribute()
    {
        return $this->inputMaterial->name;
    }
}
