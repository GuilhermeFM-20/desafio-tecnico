<?php

namespace Tests\Unit\Functional\Livewire;

use App\Livewire\Grid;
use Livewire\Livewire;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{

    public function test_example(): void
    {
        Livewire::test(Grid::class)
        ->assertStatus(200);
    }
}
