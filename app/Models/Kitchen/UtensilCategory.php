<?php

namespace App\Models\Kitchen;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;

/**
 * Class UtensilCategory
 * @package App\Models\Kitchen
 */
class UtensilCategory extends Model
{
    use SoftDeletes, SearchTrait;

    public $table = 'utensil_categories';

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
        'name' => 'required|min:1|max:128|unique:utensil_categories'
    ];
}
