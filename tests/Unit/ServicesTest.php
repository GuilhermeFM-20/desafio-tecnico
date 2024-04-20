<?php

namespace Tests\Unit;

use App\Services\Services;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testResponseProviders()
    {
        $response = new Services();
        $data = $response->request('GET',"https://brasilapi.com.br/api/ibge/municipios/v1/RS");
        $this->assertIsArray($data);
    }

    public function testExceptionResponseProviders()
    {
        $response = new Services();
        $this->expectException(ClientException::class);
        $response->request('GET',"https://brasilapi.com.br/api/ibge/municipios/v4");
    }
}
