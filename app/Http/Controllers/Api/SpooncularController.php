<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Spooncular\Recipe\Id\GetRecipeInformation;
use App\Http\Requests\Spooncular\Recipe\Id\GetSimilarRecipe;
use App\Http\Requests\Spooncular\Recipe\QuickAnswerRequest;
use App\Http\Requests\Spooncular\Recipe\RecipeByIngredientsRequest;
use App\Http\Requests\Spooncular\Recipe\RecipeByNutrientsRequest;
use App\Http\Requests\Spooncular\Recipe\SearchRecipeRequest;
use App\Library\ApiBaseResponse;
use App\Service\Api\Spooncular\SpooncularService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class SpooncularController extends Controller
{
    private $spoonCularService;
    private $apiBaseResponse;

    public function __construct(SpooncularService $spoonCularService, ApiBaseResponse $apiBaseResponse)
    {
        $this->spoonCularService = $spoonCularService;
        $this->apiBaseResponse = $apiBaseResponse;

    }

    public function searchRecipes(SearchRecipeRequest $request)
    {
        try {
            $result = $this->spoonCularService->searchRecipes($request);

            if ($result['code'] == 200) {
                $response = $this->apiBaseResponse->singleData($result['data'], []);
                return response($response, Response::HTTP_OK);

            } else {
                $response = $this->apiBaseResponse->status(400, $result['data']->message, $result['data']);
                return response($response, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getRecipeInformation(GetRecipeInformation $request)
    {
        try {
            $result = $this->spoonCularService->getRecipeInformation($request);

            if ($result['code'] == 200) {
                $response = $this->apiBaseResponse->singleData($result['data'], []);
                return response($response, Response::HTTP_OK);

            } else {
                $response = $this->apiBaseResponse->status(400, $result['data']->message, $result['data']);
                return response($response, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function quickAnswer(QuickAnswerRequest $request)
    {
        try {
            $result = $this->spoonCularService->quickAnswer($request);

            if ($result['code'] == 200) {
                $response = $this->apiBaseResponse->singleData($result['data'], []);
                return response($response, Response::HTTP_OK);

            } else {
                $response = $this->apiBaseResponse->status(400, $result['data']->message, $result['data']);
                return response($response, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function searchRecipeByIngredients(RecipeByIngredientsRequest $request)
    {
        try {
            $result = $this->spoonCularService->searchRecipeByIngredients($request);

            if ($result['code'] == 200) {
                $response = $this->apiBaseResponse->singleData($result['data'], []);
                return response($response, Response::HTTP_OK);

            } else {
                $response = $this->apiBaseResponse->status(400, $result['data']->message, $result['data']);
                return response($response, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function searchRecipeByNutrients(RecipeByNutrientsRequest $request)
    {
        try {
            $result = $this->spoonCularService->searchRecipeByNutrients($request);

            if ($result['code'] == 200) {
                $response = $this->apiBaseResponse->singleData($result['data'], []);
                return response($response, Response::HTTP_OK);

            } else {
                $response = $this->apiBaseResponse->status(400, $result['data']->message, $result['data']);
                return response($response, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getSimilarRecipe(GetSimilarRecipe $request)
    {
        try {
            $result = $this->spoonCularService->getSimilarRecipe($request);

            if ($result['code'] == 200) {
                $response = $this->apiBaseResponse->singleData($result['data'], []);
                return response($response, Response::HTTP_OK);

            } else {
                $response = $this->apiBaseResponse->status(400, $result['data']->message, $result['data']);
                return response($response, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e) {
            Log::info($e->getMessage());
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}