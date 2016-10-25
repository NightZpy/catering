<?php

namespace App\Models\Kitchen;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class Utensil
 * @package App\Models\Kitchen
 */
class Utensil extends Model
{
    use SoftDeletes, SearchTrait, SortTrait;

    public $table = 'utensils';
    
    protected $searchableColumns = [
        'name',
        'stock',
        'cost',
        'units_x_100',
        'category' => [
            'table' => 'utensil_categories',
            'name'
        ]
    ];     

    protected $appends = [
        'code',
        'category_name',
        'cost_format',
        'total_cost',
        'total_cost_format'
    ];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'stock',
        'cost',
        'units_x_100',
        'category_id',        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'        => 'string',
        'stock'       => 'integer',
        'cost'        => 'float',
        'units_x_100' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:utensils',
        'stock' => 'required|numeric|digits_between:1,10',
        'cost' => 'required|numeric|digits_between:1,10',
        'units_x_100' => 'required|numeric|digits_between:1,10',
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
        if ( $this->category )
            return $this->category->name;
        return false;
    } 

    public function getCodeAttribute()
    {
       return ( $this->id < 10 ? '0' . $this->id : $this->id );
    }       

    public function getCostFormatAttribute()
    {
       return number_format($this->cost, '2', ',', '.');
    } 

    public function getTotalCostAttribute()
    {
       return $this->cost * $this->stock;
    }

    public function getTotalCostFormatAttribute()
    {
       return number_format($this->total_cost, '2', ',', '.');
    }   
}
