<?php

namespace Tests\Unit\Functional\Livewire;

use App\Livewire\Grid;
use Livewire\Livewire;
use Tests\TestCase;

class GridTest extends TestCase
{

    public function testStatusCallComponentGrid(): void
    {   
        Livewire::test(Grid::class)->assertStatus(200);
    }

    public function testViewRenderOfPage()
    {
        Livewire::test(Grid::class)
            ->assertSee('Código IBGE')
            ->assertSee('Município');
    }

    public function testViewSearchOfPage()
    {
        Livewire::test(Grid::class)
        ->set('state', 'RN')
        ->call('search')
        ->assertSee('MOSSORO');
    }

    public function testSelectReturnStates()
    {
        Livewire::test(Grid::class)
        ->call('render')
        ->assertSet('states', 'RS');
    }

}
