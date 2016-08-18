<?php

namespace App\Models\Kitchen\Recipe;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BaseRecipe
 * @package App\Models\Kitchen\recipe
 */
class BaseRecipe extends Model
{
    use SoftDeletes;

    public $table = 'base_recipes';
    
    protected $appends = [
        'code',
        'type_name'
    ];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'servings_quantity',
        'quantity',
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
        'name' => 'required|min:1|max:128|unique:base_recipes',
        'servings_quantity' => 'numeric|digits_between:1,4',
        'quantity' => 'required|digits_between:1,4',
        'description' => 'min:1|max:1024',
        'photo' => 'min:1|max:256|image|max:2048',
        'type_id' => 'required|exists:recipe_types,id'
    ];

    /**
     *
     *-------------------- Relations
     *
     */
    public function type()
    {
        return $this->belongsTo(RecipeType::class);
    }  

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    public function getCodeAttribute()
    {
        return 'RCT-' . $this->id;
    }      

    public function getTypeNameAttribute()
    {
        return $this->type->name;
    }      
}
