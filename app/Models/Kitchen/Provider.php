<?php

namespace App\Models\Kitchen;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider
 * @package App\Models\Kitchen
 */
class Provider extends Model
{
    use SoftDeletes;

    public $table = 'providers';
    

    protected $dates = ['deleted_at'];

    protected $appends = [
        'price_format',
        'selected_format'    
    ];

    public $fillable = [
        'code',
        'name',
        'specialty',
        'district',
        'address',
        'phone',
        'movil1',
        'movil2',
        'contact',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'specialty' => 'string',
        'district' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'movil1' => 'string',
        'movil2' => 'string',
        'contact' => 'string',
        'email' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:providers',
        'specialty' => 'required|min:1|max:128',
        'district' => 'min:1|max:128',
        'address' => 'min:12|max:512',
        'phone' => 'required|numeric|digits_between:7,20',
        'movil1' => 'numeric|digits_between:7,20',
        'movil2' => 'numeric|digits_between:7,20',
        'contact' => 'min:1|max:128',
        'email' => 'required|email|min:3|max:128|unique:providers'
    ];

    /**
     *
     *-------------------- Relations
     *
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    /*
     * -------------------- Getters and Setters
     */
    public function setCodeAttribute($value)
    {
        if (empty($value)) 
            if($this->all())
                $this->attributes['code'] = intval($this->all()->last()->code) + 1;
            else
                $this->attributes['code'] = 1;
        else
            $this->attributes['code'] = $value;
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
