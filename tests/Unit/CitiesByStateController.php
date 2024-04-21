<?php

namespace Tests\Unit;

use Tests\TestCase;

class CitiesByStateController extends TestCase
{
    public function testReturnStatusSuccessRotaApi(): void
    {
        $response = $this->get('http://localhost:8000/api/state/RN');
        $response->assertStatus(200);
    }

    public function testReturnStatusErrorRotaApi(): void
    {
        $response = $this->get('http://localhost:8000/api/state/XX');
        $response->assertStatus(500);
    }
}
