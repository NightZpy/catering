<?php

namespace App\Http\Requests\API;

use App\Models\Family;

class UpdateFamilyAPIRequest extends MyAPIRequest
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
        $rules = Family::$rules;
        $rules['name'] = $rules['name'] . ',name,' . $this->id;
        return $rules;    
    }
}
