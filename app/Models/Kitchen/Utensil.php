<?php

namespace App\Models\Kitchen;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Utensil
 * @package App\Models\Kitchen
 */
class Utensil extends Model
{
    use SoftDeletes;

    public $table = 'utensils';
    
    protected $appends = [
        'category_name',
    ];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'stock',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'stock' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:utensils',
        'stock' => 'required|numeric|min:0',
        'category_id' => 'required|exists:utensil_categories,id'
    ];

    /**
     *
     *-------------------- Relations
     *
     */

    public function category()
    {
        return $this->belongsTo(UtensilCategory::class);
    } 

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }       
}
