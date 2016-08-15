<?php

namespace App\Http\Requests\API\Kitchen\recipe;

use App\Models\Kitchen\recipe\RecipeType;
use App\Http\Requests\API\MyAPIRequest;

class UpdateRecipeTypeAPIRequest extends MyAPIRequest
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
        $rules = RecipeType::$rules;
        $rules['name'] = $rules['name'] . ',name,' . $this->id;
        return $rules;
    }
}
