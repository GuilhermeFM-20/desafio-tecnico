<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\States;
use App\Services\CitiesByStateService;

class Grid extends Component
{

    public array $states;
    public array $cities;
    public ?string $state = '';
    public ?string $city;
    public int $page;

    public function mount()
    {
        $this->states = States::cases();
    }

    public function search()
    {
        $data = new CitiesByStateService();
        $this->cities = $data->setState($this->state)->getCitiesByState();
    }

    public function render()
    {
        return view('livewire.grid',['states'=>$this->states]);
    }
}