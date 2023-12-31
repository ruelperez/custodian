<?php

namespace App\Http\Livewire;

use App\Models\Distribute;
use App\Models\Ranking;
use App\Models\Receiver;
use Carbon\Traits\Date;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Graph extends Component
{
    public $item_name = [], $item_type = "all", $month_name, $pie_name = [], $pie_qty = [], $sel, $item_quantity = [], $lack_item, $totalTeacher;
    public function render()
    {
        $dateYear = \date('Y-');
//Pie Graph
        $pie = Ranking::where('created_at','like','%'.$dateYear.$this->sel.'%')
            ->orderBy('quantity','desc')
            ->take('10')
            ->get();

        foreach ($pie as $p){
            $this->pie_name[] = $p->item_name;
            $this->pie_qty [] = $p->quantity;
        }
        $this->totalTeacher = Receiver::all();
//Bar Graph
        if ($this->item_type == 'all'){
            $inv = \App\Models\Inventory::all();
            foreach ($inv as $invs){
                $this->item_name[] = $invs->item_name;
                $this->item_quantity[] = $invs->quantity;
            }
        }
        elseif ($this->item_type == 'consumable'){
            $inv = \App\Models\Inventory::where('item_type', '=', 'consumable')->get();
            foreach ($inv as $invs){
                $this->item_name[] = $invs->item_name;
                $this->item_quantity[] = $invs->quantity;
            }
        }
        else{
            $inv = \App\Models\Inventory::where('item_type', '=', 'non-consumable')->get();
            foreach ($inv as $invs){
                $this->item_name[] = $invs->item_name;
                $this->item_quantity[] = $invs->quantity;
            }
        }


        $this->lack_item = \App\Models\Inventory::all();
        return view('livewire.graph');
    }

    public function mount($month,$mon,$item_type){
        $this->sel = $month;
        $this->month_name = $mon;
        $this->item_type = $item_type;
    }
}
