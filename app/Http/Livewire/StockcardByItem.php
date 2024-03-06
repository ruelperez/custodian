<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StockcardByItem extends Component
{
    public $search, $request_data, $clickView = 0, $dateData;

    public function render()
    {
        if ($this->search != ""){
            $this->search();
        }
        else{
            $this->request_data = \App\Models\StockCard::select('item_name')
                ->where('unit_cost','<=',50000)
                ->distinct()
                ->get();
        }

        return view('livewire.stockcard-by-item');
    }

    public function search(){
        $this->request_data = DB::table('stock_cards')
            ->select('item_name')
            ->where('item_name','LIKE', '%'.$this->search.'%')
            ->distinct()
            ->get();
    }

    public function click($name){
        $this->dateData = $name;
        $this->clickView = 1;
    }

    protected $listeners = [
        'clickBack2' => 'back',
        'clickBack4' => 'back',
    ];

    public function back(){
        $this->clickView = 0;
    }

}
