<?php

namespace App\Models\Kitchen\Recipe;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recipe
 * @package App\Models\Kitchen\Recipe
 */
class Recipe extends Model
{
    use SoftDeletes;

    public $table = 'recipes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'servings_quantity',
        'description',
        'photo',
        'type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'photo' => 'string',
        'type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:recipes',
        'servings_quantity' => 'numeric|digits_between:1,4',
        'description' => 'min:1|max:1024',
        'photo' => 'image|max:2048',
        'type_id' => 'required|exists:recipe_types,id'
    ];
}
