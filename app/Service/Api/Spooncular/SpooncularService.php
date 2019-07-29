<?php


namespace App\Service\Api\Spooncular;


use App\Http\Client\SpooncularClient;
use App\Http\Requests\Spooncular\Recipe\Id\GetRecipeInformation;
use App\Http\Requests\Spooncular\Recipe\QuickAnswerRequest;
use App\Http\Requests\Spooncular\Recipe\RecipeByIngredientsRequest;
use App\Http\Requests\Spooncular\Recipe\RecipeByNutrientsRequest;
use App\Http\Requests\Spooncular\Recipe\SearchRecipeRequest;
use GuzzleHttp\Exception\TransferException;

class SpooncularService
{
    private $spoonCularClient;

    public function __construct(SpooncularClient $client)
    {
        $this->spoonCularClient = $client;

    }

    public function searchRecipes(SearchRecipeRequest $request)
    {
        try {
            $response = $this->spoonCularClient->request("/recipes/search", [
                'query' => $request->get('query'),
                'cuisine' => $request->get('cuisine'),
                'diet' => $request->get('diet'),
                'excludeIngredients' => $request->get('excludeIngredients'),
                'intolerances' => $request->get('intolerances'),
                'offset' => $request->get('offset'),
                'number' => $request->get('number'),
                'limitLicense' => $request->get('limitLicense'),
                'instructionsRequired' => $request->get('instructionsRequired')
            ]);

            return [
                'code' => $response['code'],
                'data' => $response['data']
            ];


        } catch (TransferException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents());
            return [
                'code' => $e->getResponse()->getStatusCode(),
                'data' => $data
            ];
        }

    }

    public function getRecipeInformation(GetRecipeInformation $request)
    {
        try {
            $response = $this->spoonCularClient->request("/recipes/" . $request->get('id') . "/information", [
                'id' => $request->get('id'),
                'includeNutrition' => $request->get('includeNutrition')
            ]);

            return [
                'code' => $response['code'],
                'data' => $response['data']
            ];


        } catch (TransferException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents());
            return [
                'code' => $e->getResponse()->getStatusCode(),
                'data' => $data
            ];
        }

    }

    public function quickAnswer(QuickAnswerRequest $request)
    {
        try {
            $response = $this->spoonCularClient->request("/recipes/quickAnswer", [
                'q' => $request->get('q'),
            ]);

            return [
                'code' => $response['code'],
                'data' => $response['data']
            ];


        } catch (TransferException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents());
            return [
                'code' => $e->getResponse()->getStatusCode(),
                'data' => $data
            ];
        }

    }

    public function searchRecipeByIngredients(RecipeByIngredientsRequest $request)
    {
        try {
            $response = $this->spoonCularClient->request("/recipes/findByIngredients", [
                'ingredients' => $request->get('ingredients'),
                'number' => $request->get('number'),
                'limitLicense' => $request->get('limitLicense'),
                'ranking' => $request->get('ranking'),
                'ignorePantry' => $request->get('ignorePantry')
            ]);

            return [
                'code' => $response['code'],
                'data' => $response['data']
            ];

        } catch (TransferException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents());
            return [
                'code' => $e->getResponse()->getStatusCode(),
                'data' => $data
            ];
        }

    }

    public function searchRecipeByNutrients(RecipeByNutrientsRequest $request)
    {
        try {
            $response = $this->spoonCularClient->request("/recipes/findByIngredients", [
                $request->all()
            ]);

            return [
                'code' => $response['code'],
                'data' => $response['data']
            ];

        } catch (TransferException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents());
            return [
                'code' => $e->getResponse()->getStatusCode(),
                'data' => $data
            ];
        }

    }

}