<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\States;
use App\Services\CitiesByStateService;
use \Illuminate\Pagination\LengthAwarePaginator;

class Grid extends Component
{

    public $states;
    public $cities;
    public $state;
    public $city ;

    public function mount(){
        $data = new CitiesByStateService();
        $this->states = States::$values;
        $this->cities = $data->setState($this->states[0])->getCitiesByState();        
    }

    public function search(){
        $data = new CitiesByStateService();
        $this->cities = $data->setState($this->state)->getCitiesByState();
    }

    public function render()
    {
        return view('livewire.grid',['states'=>$this->states]);
    }
}