<?php

namespace App\Models\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Kitchen\Recipe\RecipeType;
use App\Models\Kitchen\Utensil;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

/**
 * Class Recipe
 * @package App\Models\Kitchen\Recipe
 */
class Recipe extends Model
{
    use Eloquence;
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

    protected $searchableColumns = [
        'columns' => [
            'recipes.name' => 10,
            'recipes.description' => 2,
            'recipe_types.name' => 3,
            //'items.name' => 2,
        ],
        'joins' => [
            //'base_recipe_item' => ['base_recipes.id', 'base_recipe_item.base_id'],
            //'items' => ['base_recipe_item.item_id','items.id'],
            'recipe_types' => ['recipes.type_id','recipe_types.id']
        ],
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

    /*public function bases()
    {
        return $this->belongsToMany(BaseRecipe::class, 'base_recipe_recipe', 'base_id', 'base_id')
                    ->withPivot(
                        'purchase_quantity', 
                        'cost_per_quantity',
                        'decrease',
                        'servings_quantity'
                        );
    }*/

    public function utensils()
    {
        return $this->belongsToMany(Utensil::class, 'recipe_utensil', 'recipe_id', 'utensil_id')
                    ->withPivot('quantity');
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
