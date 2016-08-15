<?php

namespace App\Http\Requests\API\Kitchen\Recipe;

use App\Models\Kitchen\Recipe\RecipeType;
use App\Http\Requests\API\MyAPIRequest;

class CreateRecipeTypeAPIRequest extends MyAPIRequest
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
        return RecipeType::$rules;
    }
}
