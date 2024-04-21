<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CitiesByStateService;

class CitiesByStateServiceUnitTest extends TestCase
{
    public function  testExceptionSetState(): void
    {
        $cities = new CitiesByStateService();
        $this->expectException(\InvalidArgumentException::class);
        $cities->setState('XX');
    }

    public function  testSetState(): void
    {
        $cities = new CitiesByStateService();
        $cities->setState('RS');
        $this->assertEquals('RS',$cities->getState());
    }

    public function  testGetCitiesByState(): void
    {
        putenv('CITIES_API_PROVIDER=API_BRASIL');
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $data = app(CitiesByStateService::class)->setState('RN')->getCitiesByState();
        $this->assertNotEmpty($data);
        $this->assertArrayHasKey('name',$data[0]);
        $this->assertArrayHasKey('ibge_code',$data[0]);
    }

    public function  testGetCitiesByStateFromIbgeByState(): void
    {
        
        $data = app(CitiesByStateService::class)->setState('RN')->getCitiesByState();
        putenv('CITIES_API_PROVIDER=API_IBGE');
        putenv('ENDPOINT_CITIES_API_IBGE="https://servicodados.ibge.gov.br/api/v1/localidades/estados/"');
        $this->assertNotEmpty($data);
        $this->assertArrayHasKey('name',$data[0]);
        $this->assertArrayHasKey('ibge_code',$data[0]);
    }

}
