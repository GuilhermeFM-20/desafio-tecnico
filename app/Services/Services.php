<?php

namespace App\Services;

use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Services
{
    public function request($method, $endpoint)
    {
        try{
            $client = new CLient();
            $response = $client->request($method, $endpoint);
            return ['data' => json_decode($response->getBody()),
                    'status' => $response->getStatusCode()];  
        }catch(HttpException $e){
            Log::warning($e->getMessage());
            throw new HttpException("Serviço Indisponível.");
        }
    }
}