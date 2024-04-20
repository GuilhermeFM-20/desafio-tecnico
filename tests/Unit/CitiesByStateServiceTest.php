<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CitiesByStateService;

class CitiesByStateServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function  testExceptionSetState()
    {
        $cities = new CitiesByStateService();
        $this->expectException(\RuntimeException::class);
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
        $array = $cities->setState('RN')->getCitiesByState();
        $this->assertNotEmpty($array);
    }

}
