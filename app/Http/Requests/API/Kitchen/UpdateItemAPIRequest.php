<?php

namespace App\Http\Requests\API\Kitchen;

use App\Models\Kitchen\Item;

class UpdateItemAPIRequest extends MyAPIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Item::$rules;
    }
}
