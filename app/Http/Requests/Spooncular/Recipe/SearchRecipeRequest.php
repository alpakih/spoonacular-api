<?php

namespace App\Http\Requests\Spooncular\Recipe;

use App\Helpers\GeneralHelpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SearchRecipeRequest extends FormRequest
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
            //The (natural language) recipe search query.
            'query' => 'required',
            //The cuisine(s) of the recipes. One or more comma separated. See a full list of supported cuisines.
            'cuisine',
            //The diet to which the recipes must be compliant. See a full list of supported diets.
            'diet',
            //An comma-separated list of ingredients or ingredient types that must not be contained in the recipes.
            'excludeIngredients',
            //A comma-separated list of intolerances. All found recipes must not have ingredients that could cause
            //problems for people with one of the given tolerances. See a full list of supported intolerances.
            'intolerances',
            //The number of results to skip (between 0 and 900).
            'offset'=>'numeric|nullable',
            //The number of results to return (between 1 and 100).
            'number'=>'numeric|nullable',
            //Whether the recipes should have an open license that allows for displaying with proper attribution.
            'limitLicense'=>'boolean|nullable',
            //Whether the recipes must have instructions.
            'instructionsRequired'=>'boolean|nullable',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $validate = new GeneralHelpers();
        $validate->failedValidation($validator);
    }
}
