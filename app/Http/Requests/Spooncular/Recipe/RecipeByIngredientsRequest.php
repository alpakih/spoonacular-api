<?php

namespace App\Http\Requests\Spooncular\Recipe;


use App\Helpers\GeneralHelpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RecipeByIngredientsRequest extends FormRequest
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
        return [
            'ingredients' => "required",
            'number' => "numeric|nullable",
            'limitLicense' => "boolean|nullable",
            'ranking' => "numeric|nullable",
            'ignorePantry' => "boolean|nullable"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $validate = new GeneralHelpers();
        $validate->failedValidation($validator);
    }
}
