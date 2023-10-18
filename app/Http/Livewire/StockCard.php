<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StockCard extends Component
{
    use WithPagination;

    public $itemName, $clickBk=0, $stockNum, $stockcard_data;

    public function render()
    {
        $this->stockcard_data = DB::table('stock_cards')
            ->where('item_name', '=', $this->itemName)
            ->orderBy('created_at','desc')
            ->get();
        foreach ($this->stockcard_data as $st){
            $this->stockNum = $st->stock_num;
        }

        return view('livewire.stock-card');
    }

    public function mount($dateData){
        $this->itemName = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }

    public function updated($field){
        if ($field === 'stockNum'){
           $data = \App\Models\StockCard::where('item_name','=',$this->itemName)->get();
           foreach ($data as $datas){
               $rowData = \App\Models\StockCard::find($datas->id);
               $rowData->stock_num = $this->stockNum;
               $rowData->save();
           }
        }


    }

    public function inputStockNum(){

    }

}
