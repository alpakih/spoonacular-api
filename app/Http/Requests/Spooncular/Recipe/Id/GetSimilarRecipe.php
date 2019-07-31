<?php

namespace App\Http\Requests\Spooncular\Recipe\Id;

use App\Helpers\GeneralHelpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GetSimilarRecipe extends FormRequest
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
            'recipe_id' => 'required',
            'number' => 'numeric|nullable'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $validate = new GeneralHelpers();
        $validate->failedValidation($validator);
    }
}
