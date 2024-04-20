<?php

namespace App\Services;

use App\Enums\States;
use Illuminate\Support\Facades\Log;
use NunoMaduro\Collision\Adapters\Phpunit\State;
USE GuzzleHttp\Exception\ConnectException;

class CitiesByStateService extends Services
{
    private $endpoint;
    public $endpoint_ibge;
    private $state;

    public function __construct()
    {
        $this->endpoint = env('ENDPOINT_CITIES_API');
        $this->endpoint_ibge = env('ENDPOINT_CITIES_API_IBGE');
        $this->state = '';
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        try{
            if(!in_array($state,States::$values)){
                throw new \InvalidArgumentException('A sigla do estado é inválida.');
            }
            $this->state = $state;
            return $this;
        }catch(\InvalidArgumentException $e){
            Log::warning($e->getMessage());
        }
    }

    public function getCitiesByState()
    {   
        try{
            $response = $this->request('GET',$this->endpoint.$this->state);
            return $response['data'];
        }catch(ConnectException $e){   
            Log::warning($e->getMessage());
            $response = $this->request('GET',$this->endpoint_ibge.$this->state."/municipios");
            return $response['data'];
        }

    }
    

}