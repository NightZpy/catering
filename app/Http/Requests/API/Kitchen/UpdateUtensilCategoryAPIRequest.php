<?php

namespace App\Http\Requests\API\Kitchen;

use App\Models\Kitchen\UtensilCategory;
use App\Http\Requests\API\MyAPIRequest;

class UpdateUtensilCategoryAPIRequest extends MyAPIRequest
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
    public function rules() {
        $rules = UtensilCategory::$rules;
        $rules['name'] = $rules['name'] . ',name,' . $this->id;
        //$rules['email'] = $rules['email'] . ',email,' . $this->id;
        return $rules;
    }
}
