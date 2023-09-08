<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Portion extends Component
{
    public $option = "graph";

    public function render()
    {
        return view('livewire.portion');
    }

    public function clickPortion($porName){
        $this->option = $porName;
    }
}
