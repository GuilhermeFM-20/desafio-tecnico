<?php

namespace App\Services;

use App\Enums\States;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;
use App\Providers\BrasilApiProvider;
use App\Providers\IBGEApiProvider;
use Nette\Utils\Paginator;

class CitiesByStateService
{
    private string $state;
    public function __construct()
    {
        $this->state = '';
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        if(!States::stateExists($state)){
            throw new \InvalidArgumentException('A sigla do estado é inválida.');
        }
        $this->state = $state;

        return $this;
    }

    public function getCitiesByState(): array
    {   
        switch(env('CITIES_API_PROVIDER')){
            case 'API_BRASIL':
                $provider = app(BrasilApiProvider::class);
            break;
            case 'API_IBGE':
                $provider = app(IBGEApiProvider::class);
            break;
            default:
                throw new \Exception('Provider não mapeado');
            break;
        }

        try{
            return $provider->getCities($this->state);         
        }catch(ClientException $e){   
            Log::warining($e->getMessage());
        }
    }

}