<?php

namespace App\Models\Kitchen\Recipe;

use App\Models\Kitchen\Utensil;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kitchen\BaseRecipeRecipePivot;
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
        'type_name',
        'total_weight',
        'total_weight_format',
        'cost_mp_x_recipe',
        'cost_mp_x_recipe_format',
        'cost_mp_x_ration',
        'cost_mp_x_ration_format'        
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
     *-------------------- Overwrite pivot
     *
     */    
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof BaseRecipe) {
            return new BaseRecipeRecipePivot($parent, $attributes, $table, $exists);
        }
        return parent::newPivot($parent, $attributes, $table, $exists);
    }   

    /**
     *
     *-------------------- Relations
     *
     */
    public function bases()
    {
        return $this->belongsToMany(BaseRecipe::class, 'base_recipe_recipe', 'recipe_id', 'base_id')
                    ->withPivot('required_quantity');
    }

    public function type()
    {
        return $this->belongsTo(RecipeType::class);
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
        return 'RCFNL-' . $this->id;
    }      

    public function getTypeNameAttribute()
    {
        return $this->type->name;
    } 

    public function getTotalWeightAttribute()
    {
        if ( !$this->bases()->count() )
            return 0;

        $total = 0;
        foreach ($this->bases as $base) 
            $total += $base->pivot->ration_weight;
        return $total;
    }

    public function getTotalWeightFormatAttribute()
    {
        return number_format($this->total_weight, 1, ',', '.');
    }    

    public function getCostMPXRecipeAttribute()
    {
        if ( !$this->bases()->count() )
            return 0;

        $total = 0;
        foreach ($this->bases as $base) 
            $total += $base->pivot->cost;
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
