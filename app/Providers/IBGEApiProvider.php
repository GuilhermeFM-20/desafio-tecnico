<?php

namespace App\Providers;

use \GuzzleHttp\Client;

class IBGEApiProvider
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('ENDPOINT_CITIES_API_IBGE');
    }

    public function getCities(string $state): array
    {
        $response = app(Client::class)->get($this->baseUrl.$state."/municipios");
        $data = json_decode($response->getBody());

        return $this->parsedData($data); 
    }

    private function parsedData($data): array
    {       
        $result = [];

        foreach($data as $value){
            $result[] = [
                'name' => $value['nome'],
                'ibge_code'=> $value['id']
            ];
        }

        return $result;
    }

}