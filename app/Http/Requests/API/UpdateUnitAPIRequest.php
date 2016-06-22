<?php

namespace App\Http\Requests\API;

use App\Models\Unit;

class UpdateUnitAPIRequest extends MyAPIRequest
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
        $rules = Unit::$rules;
        $rules['name'] = $rules['name'] . ',name,' . $this->id;
        $rules['symbol'] = $rules['symbol'] . ',symbol,' . $this->id;
        return $rules;        
    }
}
