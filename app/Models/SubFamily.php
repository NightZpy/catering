<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubFamily
 * @package App\Models
 */
class SubFamily extends Model
{
    use SoftDeletes;

    public $table = 'sub_families';

    protected $appends = [
        'input_material_code', 
        'input_material_name', 
        'family_code', 
        'family_name', 
        'compose_code'
    ];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'code',
        'input_material_id',
        'families'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'input_material_id' => 'integer',
        'family_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:sub_families',
        'code' => 'required|min:1|max:10|unique:sub_families',
        'input_material_id' => 'required|exists:input_materials,id',
        'family_id' => 'required|exists:families,id',
    ];

    /**
     *
     *-------------------- Relations
     *
     */
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function inputMaterial()
    {
        return $this->belongsTo(InputMaterial::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    public function getFamilyCodeAttribute()
    {
        return $this->family->code;
    }

    public function getFamilyNameAttribute()
    {
        return $this->family->name;
    }

    public function getInputMaterialCodeAttribute()
    {
        return $this->inputMaterial->code;
    }  

    public function getInputMaterialNameAttribute()
    {
        return $this->inputMaterial->name;
    }  

    public function getCodeAttribute()
    {
        $code = $this->attributes['code'];
        if ($code < 10)
            $code = '0' . $code;
        return $code;
    } 

    public function getComposeCodeAttribute()
    {
        $inputMaterialCode = $this->inputMaterial->code;
        $familyCode = $this->family->code;
        return $familyCode . $this->code . $inputMaterialCode;
    }     
}
