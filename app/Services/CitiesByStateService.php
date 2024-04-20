<?php

namespace App\Services;

use App\Enums\States;
use Illuminate\Support\Facades\Log;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class CitiesByStateService extends Services
{
    private $endpoint;
    private $endpoint_ibge;
    private $state;

    public function __construct()
    {
        $this->endpoint = env('ENDPOINT_CITIES_API');
        $this->endpoint_ibge = env('ENDPOINT_CITIES_API_IBGE');
        $this->state = '';
    }

    public function selectState($state)
    {
        try{
            $this->state = States::from($state);
            return $this;
        }catch(\InvalidArgumentException $e){
            Log::warning($e->getMessage());
            throw new \InvalidArgumentException("A sigla do estado é inválida.");
        }
    }

    public function getCitiesByState()
    {   
        $response = $this->request('GET',$this->endpoint.$this->state);

        if($response['status'] != 200){
            $response = $this->request('GET',$this->endpoint.$this->state."/municipios");
        }

        return $response['data'];
    }
    

}