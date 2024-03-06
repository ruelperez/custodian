<?php

namespace App\Http\Livewire;

use App\Models\Par;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ParReport extends Component
{
    public $search="", $request_data, $clickBk = 0, $dataDate;

    public function render()
    {
        $this->request_data = Par::
            where('parnum','=', $this->dataDate)
            ->get();
        return view('livewire.par-report');
    }

    public function mount($dateData){
        $this->dataDate = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }
}
