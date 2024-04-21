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
        $response = new BrasilApiProvider();
        putenv('CITIES_API_PROVIDER=API_BRASIL');
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $data = $response->getCities('RN');
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProvidersBrasilApi()
    {
        $response = new BrasilApiProvider();
        putenv('CITIES_API_PROVIDER=API_BRASIL');
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $this->expectException(ClientException::class);
        $response->getCities('XX');
    }

    public function testResponseProvidersIbgeApi()
    {
        $response = new IBGEApiProvider();
        putenv('CITIES_API_PROVIDER=API_BRASIL');
        putenv('ENDPOINT_CITIES_API_BRASIL="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $data = $response->getCities('RN');
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProvidersIbgeApi()
    {
        $response = new IBGEApiProvider();
        putenv('CITIES_API_PROVIDER=API_BRASIL');
        putenv('ENDPOINT_CITIES_API_BRASIL="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $this->expectException(ClientException::class);
        $response->getCities('RS');
    }

}
