<?php

namespace App\Models\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Kitchen\Recipe\RecipeType;
use App\Models\Kitchen\Utensil;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class Recipe
 * @package App\Models\Kitchen\Recipe
 */
class Recipe extends Model
{
    use SearchTrait;
    use SoftDeletes;
    use SortTrait;

    public $table = 'recipes';
    
    /**
     * Searchable rules.
     *
     * @var array
     */  
    protected $searchableColumns = [
        'name',
        'servings_quantity',
        'type' => [
            'table' => 'recipe_types',
            'name'
        ]
    ];  

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'servings_quantity',
        'description',
        'photo',
        'type_id'
    ];

    protected $appends = [
        'code',
        'type_name'
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

    /**
     *
     *-------------------- Relations
     *
     */
    public function type()
    {
        return $this->belongsTo(RecipeType::class);
    }  

    public function bases()
    {
        return $this->belongsToMany(BaseRecipe::class, 'base_recipe_recipe', 'recipe_id', 'base_id')
                    ->withPivot('required_quantity');
    }

    public function utensils()
    {
        return $this->belongsToMany(Utensil::class, 'recipe_utensil', 'recipe_id', 'utensil_id');
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
