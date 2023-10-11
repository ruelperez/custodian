<?php

namespace App\Http\Livewire;

use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Graph extends Component
{
    public $item_name = [], $item_quantity = [], $lack_item, $totalTeacher;
    public function render()
    {
        $this->totalTeacher = Receiver::all();
        $inv = \App\Models\Inventory::all();
        foreach ($inv as $invs){
            if ($invs->item_type == "sets"){
                $this->item_name[] = $invs->item_name;
                $this->item_quantity[] = $invs->unit;
            }
            else{
                $this->item_name[] = $invs->item_name;
                $this->item_quantity[] = $invs->quantity;
            }
        }
        $this->lack_item = \App\Models\Inventory::all();
        return view('livewire.graph');
    }
}
