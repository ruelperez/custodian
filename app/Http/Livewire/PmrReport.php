<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PmrReport extends Component
{
    public $search="", $request_data, $clickBk = 0, $dataDate;

    public function render()
    {
        $this->request_data = DB::table('distributes')
            ->where('ics','=', $this->dataDate)
            ->where('item_type', '!=', 'consumable')
            ->get();

        return view('livewire.pmr-report');
    }

    public function mount($dateData){
        $this->dataDate = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }
}
