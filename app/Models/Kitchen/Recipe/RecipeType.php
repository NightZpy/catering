<?php

namespace App\Models\Kitchen\Recipe;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class RecipeType
 * @package App\Models\Kitchen\recipe
 */
class RecipeType extends Model
{
    use SoftDeletes, SearchTrait, SortTrait;

    public $table = 'recipe_types';

    /**
     * Searchable rules.
     *
     * @var array
     */  
    protected $searchableColumns = [
        'name'
    ];      

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
