<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Designation extends Component
{
    public $requestedBy, $designation1, $designation2, $principal, $designation3;
    public function render()
    {
        return view('livewire.designation');
    }
}
