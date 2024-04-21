<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CitiesByStateService;

class CitiesByStateServiceTest extends TestCase
{
    public function  testExceptionSetState()
    {
        $cities = new CitiesByStateService();
        $this->expectException(\InvalidArgumentException::class);
        $cities->setState('XX');
    }

    public function  testSetState()
    {
        $cities = new CitiesByStateService();
        $cities->setState('RS');
        $this->assertEquals('RS',$cities->getState());
    }

    public function  testGetCitiesByState()
    {
        $cities = new CitiesByStateService();
        putenv('CITIES_API_PROVIDER=API_BRASIL');
        putenv('ENDPOINT_CITIES_API_BRASIL="https://brasilapi.com.br/api/ibge/municipios/v1/"');
        $array = $cities->setState('RN')->getCitiesByState();
        $this->assertNotEmpty($array);
    }

}
