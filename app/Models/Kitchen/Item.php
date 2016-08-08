<?php

namespace App\Models\Kitchen;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Family;
use App\Models\SubFamily;
use App\Models\Unit;
use App\Models\Presentation;
use App\Models\Type;

/**
 * Class Item
 * @package App\Models\Kitchen
 */
class Item extends Model
{
    use SoftDeletes, \Znck\Eloquent\Traits\BelongsToThrough;


    public $table = 'items';
    
    protected $appends = [
        'auto_provider_format',
        'perishable_format',
        'unit_name', 
        'presentation_name', 
        'type_name', 
        'family_code', 
        'family_name', 
        'sub_family_code', 
        'sub_family_name', 
        'compose_code',
        'price_format',
        'selected_format'
    ];    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'code',
        'name',
        'auto_provider',
        'perishable',
        'min_stock',
        'quantity',
        'currency',
        'unit_id',
        'presentation_id',
        'type_id',
        'sub_family_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'auto_provider' => 'boolean',
        'perishable' => 'boolean',
        'currency' => 'string',
        'unit_id' => 'integer',
        'presentation_id' => 'integer',
        'type_id' => 'integer',
        'sub_family_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'code' => 'required|min:1|max:128',
        'name' => 'required|min:1|max:128|unique:items',
        'auto_provider' => 'required|boolean',
        'perishable' => 'required|boolean',
        'min_stock' => 'required|digits_between:1,4',
        'quantity' => 'required|digits_between:1,4',
        'currency' => 'required|min:1|max:128',
        'unit_id' => 'required|exists:units,id',
        'presentation_id' => 'required|exists:presentations,id',
        'type_id' => 'required|exists:types,id',
        'sub_family_id' => 'required|exists:sub_families,id'
    ];

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

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class)->withPivot('price', 'selected');
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    public function getFamilyCodeAttribute()
    {
        return $this->family->code;
    }

    public function getFamilyNameAttribute()
    {
        return $this->family->name;
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

    public function getTypeNameAttribute()
    {
        return $this->type->name;
    }   

    public function getPresentationNameAttribute()
    {
        return $this->presentation->name;
    }         

    public function getCodeAttribute()
    {
        $code = $this->attributes['code'];
        if ($code < 10)
            $code = '00' . $code;
        elseif ($code < 100) 
            $code = '0' . $code;            
        
        return $code;
    } 

    public function getComposeCodeAttribute()
    {
        $familyCode = $this->family->code;
        $subFamilyCode = $this->subFamily->code;
        return $familyCode . $subFamilyCode . $this->code;
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
}
