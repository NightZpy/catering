<?php

namespace App\Models\Kitchen;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;
use App\Models\SortTrait;

class ItemType extends Model
{

	use SoftDeletes, SearchTrait, SortTrait;

    protected $searchableColumns = [
        'name'
    ];    

    protected $dates = ['deleted_at'];

    protected $appends = [];   

    public $fillable = [
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:item_types',
    ];
}
