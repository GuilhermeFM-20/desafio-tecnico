<?php

namespace Tests\Unit;

use App\Providers\IBGEApiProvider;
use App\Providers\BrasilApiProvider;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class CitiesByStateServiceTest extends TestCase
{
    
    public function testResponseProvidersBrasilApi()
    {
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $data = app(BrasilApiProvider::class)->getCities('RN');
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProvidersBrasilApi()
    {
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $this->expectException(ClientException::class);
        app(BrasilApiProvider::class)->getCities('XX');
    }

    public function testResponseProvidersIbgeApi()
    {
        putenv('ENDPOINT_CITIES_API_IBGE="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $data = app(IBGEApiProvider::class)->getCities('RS');
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProvidersIbgeApi()
    {
        putenv('ENDPOINT_CITIES_API_IBGE="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $this->expectException(ClientException::class);
        app(IBGEApiProvider::class)->getCities('XX');
    }

}
