<?php

namespace Tests\Unit;

use App\Providers\IBGEApiProvider;
use App\Providers\BrasilApiProvider;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class CitiesByStateServiceTest extends TestCase
{
    
    public function testResponseProvidersBrasilApi(): void
    {
        
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $data = app(BrasilApiProvider::class)->getCities('RN');
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProvidersBrasilApi(): void
    {
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $this->expectException(ClientException::class);
        app(BrasilApiProvider::class)->getCities('XX');
    }

    public function testResponseProvidersIbgeApi(): void
    {
        putenv('ENDPOINT_CITIES_API_IBGE="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $data = app(IBGEApiProvider::class)->getCities('RS');
        $this->assertIsArray($data);
    }

    public function testResponseProvidersIbgeApiIbge(): void
    {
        putenv('ENDPOINT_CITIES_API_IBGE="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $this->expectException(\Exception::class);
        app(BrasilApiProvider::class)->getCities('XX');
    }

}
