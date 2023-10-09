<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StockCard extends Component
{
    use WithPagination;

    public $itemName, $clickBk=0, $stockcard_data;

    public function render()
    {
        $this->stockcard_data = DB::table('stock_cards')
            ->where('item_name', '=', $this->itemName)
            ->orderBy('created_at','desc')
            ->get();

        return view('livewire.stock-card');
    }

    public function mount($dateData){
        $this->itemName = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }

}
