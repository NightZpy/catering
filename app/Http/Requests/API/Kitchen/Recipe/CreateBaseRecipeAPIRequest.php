<?php

namespace App\Http\Requests\API\Kitchen\Recipe;

use App\Models\Kitchen\recipe\BaseRecipe;
use App\Http\Requests\API\MyAPIRequest;

class CreateBaseRecipeAPIRequest extends MyAPIRequest
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
        return BaseRecipe::$rules;
    }
}
