<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SuperHeroeService
{
    //
    protected $baseUrl = 'https://superheroapi.com/api/10230842643193709';

    public function getByName($name)
    {

        $endpoint = "{$this->baseUrl}/search/$name";
        
        Log::info("GET {$endpoint} - parameter name: {$name}");
        $response = Http::get($endpoint);
        Log::info("RES {$endpoint} - response: {$response}");

        if ($response->ok()) {
            return $response->json();
        } else {
            return $response;
        }
    }


    public function getById($id)
    {
        $endpoint = "{$this->baseUrl}/$id";

        Log::info("GET {$endpoint} - parameter id: {$id}");
        $response = Http::get($endpoint);
        Log::info("RES {$endpoint} - response: {$response}");

        if ($response->ok()) {
            return $response->json();
        } else {
            return $response;
        }
    }
}
