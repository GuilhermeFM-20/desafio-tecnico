<?php

namespace App\Services;

use \GuzzleHttp\Client;

class Services
{
    public function request($method, $endpoint)
    {
    
        $client = new Client();
        $response = $client->request($method, $endpoint);
        return ['data' => json_decode($response->getBody()),
                'status' => $response->getStatusCode()];  
    
    }
}