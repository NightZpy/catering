<?php

namespace App\Http\Requests\API;

use App\Models\Unit;
use InfyOm\Generator\Request\MyAPIRequest;
use App\Http\Requests\API\MyAPIRequest;

class CreateUnitAPIRequest extends MyAPIRequest
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
        return Unit::$rules;
    }
}
