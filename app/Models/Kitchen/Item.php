<?php
namespace App\Models\Kitchen;

use App\Models\Family;
use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Presentation;
use App\Models\SubFamily;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Kitchen\ItemType;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class Item
 * @package App\Models\Kitchen
 */
class Item extends Model
{
    use SoftDeletes, \Znck\Eloquent\Traits\BelongsToThrough, SearchTrait, SortTrait;

    public $table = 'items';
    protected $searchableColumns = [
        'name', 
        'type',
        'providers' => [
            'name', 
            'specialty'
        ],
        'bases' => [
            'table' => 'base_recipes',
            'name'
        ], 
        'family' => [
            'table' => 'families',
            'name'
        ],
        'subFamily' => [
            'table' => 'sub_families',
            'name'
        ],
        'unit' => [
            'table' => 'units',
            'name'
        ],
        /*'itemType' => [
            'table' => 'item_types',
            'name'
        ],*/
        'presentation' => [
            'table' => 'presentations',
            'name'
        ]               
    ];

    
    protected $appends = [
        'code',
        'auto_provider_format',
        'perishable_format',
        'unit_name', 
        'item_type_name',
        'presentation_name', 
        'family_code', 
        'family_name', 
        'sub_family_code', 
        'sub_family_name', 
        'compose_code',
        'price_format',
        'selected_format',
        'cost',
        'cost_format',
        'low_provider',
        'family_id',
        'to_buy'
    ]; 



    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'auto_provider',
        'perishable',
        'min_stock',
        'current_stock',
        'currency',
        'decrease',
        'type',
        'unit_id',
        'presentation_id',
        'sub_family_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code'            => 'string',
        'name'            => 'string',
        //'auto_provider'   => 'boolean',
        //'perishable'      => 'boolean',
        'currency'        => 'string',
        'unit_id'         => 'integer',
        'presentation_id' => 'integer',
        'type'            => 'string',
        'sub_family_id'   => 'integer',
        'decrease'        => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'code'          => 'required|min:1|max:128',
        'name'            => 'required|min:1|max:128|unique_with:items,type',
        'auto_provider'   => 'required',
        'perishable'      => 'required',
        'decrease'        => 'required|numeric|digits_between:1,3',
        'min_stock'       => 'required|digits_between:1,6',
        'current_stock'   => 'required|digits_between:1,6',
        //'current_stock'   => 'required|digits_between:1,4',
        'currency'        => 'required|min:1|max:128',
        'unit_id'         => 'required|exists:units,id',
        'presentation_id' => 'required|exists:presentations,id',
        'type'            => 'min:1|max:128',
        //'item_type_id'   => 'required|exists:item_types,id',
        'sub_family_id'   => 'required|exists:sub_families,id'
    ];

    /**
     *
     *-------------------- Overwrite pivot
     *
     */    
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof BaseRecipe) {
            return new BaseRecipeItemPivot($parent, $attributes, $table, $exists);
        }
        return parent::newPivot($parent, $attributes, $table, $exists);
    }
    

    /**
     *
     *-------------------- Relations
     *
     */
    public function family()
    {
        return $this->belongsToThrough(Family::class, SubFamily::class);
    }

    public function subFamily()
    {
        return $this->belongsTo(SubFamily::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class)->withPivot('price', 'selected');
    }

    public function bases()
    {
        return $this->belongsToMany(BaseRecipe::class, 'base_recipe_item', 'base_id', 'item_id')
                    ->withPivot(
                        /*'purchase_quantity', */
                        'decrease',
                        'servings_quantity',
                        'cost_per_quantity'
                    );
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    
    public function getFamilyIdAttribute()
    {
    	if ($this->family)   
        	return $this->family->id;
        return false;
    }

    public function getFamilyCodeAttribute()
    {
    	if ($this->family)    	
        	return $this->family->code;
        return false;
    }

    public function getFamilyNameAttribute()
    {
    	if ($this->family) 
        	return $this->family->name;
        return false;
    }    

    public function getSubFamilyCodeAttribute()
    {
        return $this->subFamily->code;
    }

    public function getSubFamilyNameAttribute()
    {
        return $this->subFamily->name;
    }  

    public function getUnitNameAttribute()
    {
        return $this->unit->name;
    }  

    public function getItemTypeNameAttribute()
    {
        if ($this->itemType)
            return $this->itemType->name;
        return false;
    }

    public function getPresentationNameAttribute()
    {
        if ($this->presentation)
            return $this->presentation->name;
        return false;
    }         

    public function getCodeAttribute()
    {
        $code = $this->id;
        if ($code < 10)
            $code = '00' . $code;
        elseif ($code < 100) 
            $code = '0' . $code;            
        
        return $code;
    } 

    public function getComposeCodeAttribute()
    {
    	if ($this->family) {  
	        $familyCode = $this->family->code;
	        $subFamilyCode = $this->subFamily->code;
	        return $familyCode . $subFamilyCode . $this->code;
	    }
	    return false;
    }  

    public function getAutoProviderFormatAttribute()
    {
        return ($this->auto_provider ? 'Si' : 'No');
    }

    public function getPerishableFormatAttribute()
    {
        return ($this->perishable ? 'Si' : 'No');
    }    

    public function getPriceFormatAttribute()
    {
        if (isset($this->pivot))
            return number_format($this->pivot->price, 2, ',', '.');
        return false;
    }

    public function getSelectedFormatAttribute()
    {
        if (isset($this->pivot))
            return ($this->pivot->selected ? 'Si': 'No');
        return false;
    } 

    public function getCostAttribute()
    {
        foreach ($this->providers as $provider) 
            if ($provider->pivot->selected == 1)
                return $provider->pivot->price; 
        $provider = $this->low_provider;
        if ($provider)
            return $provider->pivot->price;
        return 0;
    }

    public function getCostFormatAttribute()
    {
        return number_format($this->cost, 2, ',', '.');
    }    

    public function getLowProviderAttribute()
    {
        if ($this->providers) {
            $sorted = $this->providers->sortBy(function ($provider, $key) {
                return $provider->pivot->price;
            });
            return $sorted->first();
        }
        return false;
    }

    public function getToBuyAttribute($value='')
    {
        return ($this->min_stock <= $this->current_stock ? 0 : $this->min_stock - $this->current_stock);
    }
}
