<?php

namespace App\Http\Requests\Spooncular\Recipe;


use App\Helpers\GeneralHelpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RecipeByNutrientsRequest extends FormRequest
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
            'minCarbs' => "numeric|nullable",
            'maxCarbs' => "numeric|nullable",
            'minProtein' => "numeric|nullable",
            'maxProtein' => "numeric|nullable",
            'minCalories' => "numeric|nullable",
            'maxCalories' => "numeric|nullable",
            'minFat' => "numeric|nullable",
            'maxFat' => "numeric|nullable",
            'minAlcohol' => "numeric|nullable",
            'maxAlcohol' => "numeric|nullable",
            'minCaffeine' => "numeric|nullable",
            'maxCaffeine' => "numeric|nullable",
            'minCopper' => "numeric|nullable",
            'maxCopper' => "numeric|nullable",
            'minCalcium' => "numeric|nullable",
            'maxCalcium' => "numeric|nullable",
            'minCholine' => "numeric|nullable",
            'maxCholine' => "numeric|nullable",
            'minCholesterol' => "numeric|nullable",
            'maxCholesterol' => "numeric|nullable",
            'minFluoride' => "numeric|nullable",
            'maxFluoride' => "numeric|nullable",
            'minSaturatedFat' => "numeric|nullable",
            'maxSaturatedFat' => "numeric|nullable",
            'minVitaminA' => "numeric|nullable",
            'maxVitaminA' => "numeric|nullable",
            'minVitaminC' => "numeric|nullable",
            'maxVitaminC' => "numeric|nullable",
            'minVitaminD' => "numeric|nullable",
            'maxVitaminD' => "numeric|nullable",
            'minVitaminE' => "numeric|nullable",
            'maxVitaminE' => "numeric|nullable",
            'minVitaminK' => "numeric|nullable",
            'maxVitaminK' => "numeric|nullable",
            'minVitaminB1' => "numeric|nullable",
            'maxVitaminB1' => "numeric|nullable",
            'minVitaminB2' => "numeric|nullable",
            'maxVitaminB2' => "numeric|nullable",
            'minVitaminB5' => "numeric|nullable",
            'maxVitaminB5' => "numeric|nullable",
            'minVitaminB3' => "numeric|nullable",
            'maxVitaminB3' => "numeric|nullable",
            'minVitaminB6' => "numeric|nullable",
            'maxVitaminB6' => "numeric|nullable",
            'minVitaminB12' => "numeric|nullable",
            'maxVitaminB12' => "numeric|nullable",
            'minFiber' => "numeric|nullable",
            'maxFiber' => "numeric|nullable",
            'minFolate' => "numeric|nullable",
            'maxFolate' => "numeric|nullable",
            'minFolicAcid' => "numeric|nullable",
            'maxFolicAcid' => "numeric|nullable",
            'minIodine' => "numeric|nullable",
            'maxIodine' => "numeric|nullable",
            'minIron' => "numeric|nullable",
            'maxIron' => "numeric|nullable",
            'minMagnesium' => "numeric|nullable",
            'maxMagnesium' => "numeric|nullable",
            'minManganese' => "numeric|nullable",
            'maxManganese' => "numeric|nullable",
            'minPhosphorus' => "numeric|nullable",
            'maxPhosphorus' => "numeric|nullable",
            'minPotassium' => "numeric|nullable",
            'maxPotassium' => "numeric|nullable",
            'minSelenium' => "numeric|nullable",
            'maxSelenium' => "numeric|nullable",
            'minSodium' => "numeric|nullable",
            'maxSodium' => "numeric|nullable",
            'minSugar' => "numeric|nullable",
            'maxSugar' => "numeric|nullable",
            'minZinc' => "numeric|nullable",
            'maxZinc' => "numeric|nullable",
            'offset' => "numeric|nullable",
            'number' => "numeric|nullable",
            'random' => "boolean|nullable",
            'limitLicense' => "boolean|nullable",

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $validate = new GeneralHelpers();
        $validate->failedValidation($validator);
    }
}
