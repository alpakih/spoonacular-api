<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1','namespace'=>'API'], function () {
    Route::post('/spooncular/recipe/search', 'SpooncularController@searchRecipes');
    Route::post('/spooncular/recipe/quick-answer', 'SpooncularController@quickAnswer');
    Route::post('/spooncular/recipe/information', 'SpooncularController@getRecipeInformation');
    Route::post('/spooncular/recipe/search/by-ingredients', 'SpooncularController@searchRecipeByIngredients');
    Route::post('/spooncular/recipe/search/by-nutrients', 'SpooncularController@searchRecipeByNutrients');
    Route::post('/spooncular/recipe/similar', 'SpooncularController@getSimilarRecipe');


});