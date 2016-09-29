<?php

namespace App\Models\Kitchen\Recipe;

use App\Models\Kitchen\Item;
use App\Models\Kitchen\Utensil;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kitchen\BaseRecipeItemPivot;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class BaseRecipe
 * @package App\Models\Kitchen\recipe
 */
class BaseRecipe extends Model
{
    use SoftDeletes;
    use SearchTrait;
    use SortTrait;

    public $table = 'base_recipes';

    /**
     * Searchable rules.
     *
     * @var array
     */  
    protected $searchableColumns = [
        'name',
        'servings_quantity',
        'type' => [
            'table' => 'types',
            'name'
        ]
    ];       
    
    protected $appends = [
        'code',
        'type_name',
        'cost_mp_x_recipe',
        'cost_mp_x_recipe_format',
        'cost_mp_x_ration',
        'cost_mp_x_ration_format'
    ];

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
        'name'              => 'string',
        'description'       => 'string',
        'servings_quantity' => 'integer',
        'photo'             => 'string',
        'type_id'           => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'              => 'required|min:1|max:128|unique:base_recipes',
        'servings_quantity' => 'required|digits_between:1,4',
        'description'       => 'min:1|max:1024',
        'photo'             => 'image|max:2048',
        'type_id'           => 'required|exists:recipe_types,id'
    ];

    /**
     *
     *-------------------- Overwrite pivot
     *
     */    
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Item) {
            return new BaseRecipeItemPivot($parent, $attributes, $table, $exists);
        }
        return parent::newPivot($parent, $attributes, $table, $exists);
    }

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
                            'decrease',
                            'servings_quantity'
                        );
    }

    public function utensils()
    {
        return $this->belongsToMany(Utensil::class, 'base_recipe_utensil', 'base_id', 'utensil_id');
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

    public function getCostMPXRecipeAttribute()
    {
        if (!$this->items()->count())
            return 0;
        $total = 0;

        $items = $this->items()->get();
        foreach ($items as $item)
            $total += $item->pivot->cost;
        return $total;
    }

    public function getCostMPXRecipeFormatAttribute()
    {
        return number_format($this->cost_mp_x_recipe, 1, ',', '.');
    }

    public function getCostMPXRationAttribute()
    {
        if ($this->servings_quantity != 0) 
            return $this->cost_mp_x_recipe / $this->servings_quantity;
        return 0;
    } 

    public function getCostMPXRationFormatAttribute()
    {
        return number_format($this->cost_mp_x_ration, 1, ',', '.');
    }     
}   
