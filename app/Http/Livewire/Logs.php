<?php

namespace App\Http\Livewire;

use App\Models\Log;
use Livewire\Component;

class Logs extends Component
{
    public $searchInput, $request_data = [];

    public function render()
    {
        $this->request_data = Log::all();
        return view('livewire.logs');
    }
}
