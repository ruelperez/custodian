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
    public $item_name = [], $sel=01, $item_quantity = [], $lack_item, $totalTeacher;
    public function render()
    {
//        $dateYear = \date('Y-');
//
//        $yh = Distribute::select('item_name')
//            ->where('created_at','like','%'.$dateYear.$this->sel.'%')
//            ->distinct()
//            ->get();
//       foreach ($yh as $y){
//           $df = Distribute::where('item_name', '=', $y->item_name)->get();
//
//           $num = 0;
//           foreach ($df as $d){
//               $num+= $d->quantity;
//           }
//           $gt = Ranking::where('item_name', '=', $y->item_name)->get();
//           if (count($gt) > 0){
//               Ranking::where('item_name', '=', $y->item_name)
//               ->increment('quantity',$num);
//           }
//           else{
//               Ranking::create([
//                   'item_name' => $y->item_name,
//                   'quantity' => $num,
//               ]);
//           }
//
//       }


        $this->totalTeacher = Receiver::all();
        $inv = \App\Models\Inventory::all();
        foreach ($inv as $invs){
            $this->item_name[] = $invs->item_name;
            $this->item_quantity[] = $invs->quantity;
        }
        $this->lack_item = \App\Models\Inventory::all();
        return view('livewire.graph');
    }

    public function updated($field){
        if ($field === 'sel'){

        }
    }
}
