<?php

namespace App\Http\Livewire;

use App\Models\BackupWaste;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WasteMonth extends Component
{
    public $year, $waste, $ds=0, $unit = [], $date;

    public function render()
    {
        return view('livewire.waste-month');
    }

    public function clickBack(){
        $this->fg = 0;
    }

    public function clickVw($num){
        $validated = $this->validate([
            "year" => 'required'
        ]);
        $this->date = $this->year.'-'.$num;
        $this->waste = BackupWaste::select('item_name', 'unit', DB::raw('SUM(quantity) as total_quantity'))
            ->where('created_at', 'like', '%' . $this->date . '%')
            ->groupBy('item_name', 'unit')
            ->get();
        $this->ds = 1;
    }
}
