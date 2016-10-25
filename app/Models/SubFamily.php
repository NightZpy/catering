<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kitchen\Item;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class SubFamily
 * @package App\Models
 */
class SubFamily extends Model
{
    use SoftDeletes, SearchTrait, SortTrait;

    public $table = 'sub_families';

    protected $searchableColumns = [
        'name',
        'family' => [
            'table' => 'families',
            'name'
        ],
        'items' => [
            'name'
        ]
    ];      

    protected $appends = [
        'code',
        'family_code', 
        'family_name', 
    ];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'family_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'family_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:sub_families',
        'family_id' => 'required|exists:families,id',
    ];

    /**
     *
     *-------------------- Relations
     *
     */
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     *
     *-------------------- Accessors and Mutators
     *
     */
    public function getCodeAttribute()
    {
        $code = $this->id;
        if ($code < 10)
            $code = '00' . $code;       
        
        return $code;
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

}
