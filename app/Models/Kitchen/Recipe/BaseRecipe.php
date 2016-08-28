<?php

namespace App\Models\Kitchen\Recipe;

use App\Models\Kitchen\Item;
use App\Models\Kitchen\Utensil;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * Class BaseRecipe
 * @package App\Models\Kitchen\recipe
 */
class BaseRecipe extends Model
{
    use SoftDeletes;
    use SearchableTrait;

    public $table = 'base_recipes';

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'base_recipes.name' => 10,
            'base_recipes.description' => 2,
            'recipe_types.name' => 3,
            //'items.name' => 2,
        ],
        'joins' => [
            //'base_recipe_item' => ['base_recipes.id', 'base_recipe_item.base_id'],
            //'items' => ['base_recipe_item.item_id','items.id'],
            'recipe_types' => ['base_recipes.type_id','recipe_types.id']
        ],
    ];    
    
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

    public function items()
    {
        return $this->belongsToMany(Item::class, 'base_recipe_item', 'base_id', 'item_id')
                    ->withPivot(
                        'purchase_quantity', 
                        'cost_per_quantity',
                        'decrease',
                        'servings_quantity'
                        );
    }

    public function utensils()
    {
        return $this->belongsToMany(Utensil::class, 'base_recipe_utensil', 'base_id', 'utensil_id')
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
