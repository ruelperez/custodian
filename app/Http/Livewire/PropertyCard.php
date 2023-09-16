<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyCard extends Component
{
    use WithPagination;

    public $itemName, $clickBk=0, $stockcard_data;

    public function render()
    {
        $this->stockcard_data = DB::table('property_cards')
            ->where('item_name', '=', $this->itemName)
            ->get();

        return view('livewire.property-card');
    }

    public function mount($dateData){
        $this->itemName = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }


}
