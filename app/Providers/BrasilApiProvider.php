<?php

namespace App\Providers;

use \GuzzleHttp\Client;

class BrasilApiProvider
{   
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('ENDPOINT_CITIES_API_BRASIL');
    }

    public function getCities(string $state): array
    {
        $response = app(Client::class)->get($this->baseUrl.$state);
        $data = json_decode($response->getBody(),true);

        return $this->parsedData($data);  
    }

    private function parsedData($data): array
    {       
        $result = [];

        foreach($data as $value){
            $result[] = [
                'name' => $value['nome'],
                'ibge_code'=> $value['codigo_ibge']
            ];
        }

        return $result;
    }

}