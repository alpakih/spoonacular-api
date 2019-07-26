<?php


namespace App\Http\Client;


use GuzzleHttp\Client;

class SpooncularClient
{
    private $client;
    private $baseUrl;
    private $rapidApiHost;
    private $rapidApiKey;


    public function __construct(Client $client)
    {
        $this->client = $client;

        if (env("APP_ENV") == "local") {
            $this->baseUrl = env("X_RAPIDAPI_BASE_URL", "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com");
            $this->rapidApiHost = env("X_RAPIDAPI_HOST", "spoonacular-recipe-food-nutrition-v1.p.rapidapi.com");
            $this->rapidApiKey = env("X_RAPIDAPI_KEY", "f6b02b34d1msh55de96a9ac7320fp12786ejsn8d9f911c9472");
        } elseif (env("APP_ENV") == "develop") {
            $this->baseUrl = env("X_RAPIDAPI_BASE_URL", "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com");
            $this->rapidApiHost = env("X_RAPIDAPI_HOST", "spoonacular-recipe-food-nutrition-v1.p.rapidapi.com");
            $this->rapidApiKey = env("X_RAPIDAPI_KEY", "f6b02b34d1msh55de96a9ac7320fp12786ejsn8d9f911c9472");
        } else {
            $this->baseUrl = env("X_RAPIDAPI_BASE_URL", "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com");
            $this->rapidApiHost = env("X_RAPIDAPI_HOST", "spoonacular-recipe-food-nutrition-v1.p.rapidapi.com");
            $this->rapidApiKey = env("X_RAPIDAPI_KEY", "f6b02b34d1msh55de96a9ac7320fp12786ejsn8d9f911c9472");
        }

    }

    public function request($endpoint, $params = [])
    {
        $response = $this->client->get(
            $this->getBaseUrl() . $endpoint,
            [
                'query' => $params,
                'headers' => [
                    'X-RapidAPI-Host' => $this->getHost(),
                    'X-RapidAPI-Key' => $this->getKey(),
                ]
            ]);

        return [
            'code' => json_decode($response->getStatusCode()),
            'data' => json_decode($response->getBody()->getContents()),
        ];
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getHost(): string
    {
        return $this->rapidApiHost;
    }

    public function getKey(): string
    {
        return $this->rapidApiKey;
    }


}