<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Graph extends Component
{
    public $item_name = [], $item_quantity = [], $lack_item;
    public function render()
    {
        $inv = \App\Models\Inventory::all();
        foreach ($inv as $invs){
            $this->item_name[] = $invs->item_name;
            $this->item_quantity[] = $invs->quantity;
        }
        $this->lack_item = DB::table('inventories')->where('quantity', '<', 10)->get();

        return view('livewire.graph');
    }
}
