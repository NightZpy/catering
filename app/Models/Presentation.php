<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SearchTrait;
use App\Models\SortTrait;

/**
 * Class Presentation
 * @package App\Models
 */
class Presentation extends Model
{
    use SoftDeletes, SortTrait, SearchTrait;

    public $table = 'presentations';
    
    protected $searchableColumns = [
        'name'
    ];  

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:1|max:128|unique:presentations'
    ];
}
