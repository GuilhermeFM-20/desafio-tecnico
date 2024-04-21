<?php

namespace Tests\Unit;

use App\Providers\IBGEApiProvider;
use App\Providers\BrasilApiProvider;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testResponseProvidersBrasilApi()
    {
        $response = new BrasilApiProvider();
        $data = $response->getCities('RN');
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProvidersBrasilApi()
    {
        $response = new BrasilApiProvider();
        $this->expectException(ClientException::class);
        $response->getCities('XX');
    }

    public function testResponseProvidersIbgeApi()
    {
        $response = new IBGEApiProvider();
        $data = $response->getCities('RN');
        $data->assertIsArray($data);
    }

    public function testExceptionResponseProvidersIbgeApi()
    {
        $response = new IBGEApiProvider();
        $response->expectException(ClientException::class);
        $response->getCities('XX');
    }

}
