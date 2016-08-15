<?php

namespace App\Models\Kitchen\Recipe;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RecipeType
 * @package App\Models\Kitchen\recipe
 */
class RecipeType extends Model
{
    use SoftDeletes;

    public $table = 'recipe_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:recipe_types'
    ];
}
