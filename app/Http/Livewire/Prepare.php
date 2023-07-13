<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Prepare extends Component
{
    public $prepare_data, $fa=0, $item_name, $basin=0, $receiver, $basis=0, $pick=0, $unit, $quantity, $item_type="consumable";

    public function render()
    {
        if ($this->fa == 0){
            if ($this->item_name != "" and $this->pick == 1){
                $this->basis = 0;
                $this->pick = 0;
            }
            elseif ($this->item_name != ""){
                $this->basis = 1;
                $this->search();
            }
            else{
                $this->basis = 0;
            }
        }

        $this->prepare_data = \App\Models\Prepare::all();
        return view('livewire.prepare');
    }

    public function submit(){
        $data = $this->validate([
            'item_name' => 'required',
            'quantity' => 'integer',
        ]);
        if ($this->unit == ""){
            $this->unit = 0;
        }

        try {
            \App\Models\Prepare::create([
                'item_name' => $this->item_name,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'item_type' => $this->item_type,
            ]);
            $this->item_name = "";
            $this->quantity = "";
            $this->unit_cost = "";
            $this->total_cost = "";
            $this->unit = "";
            session()->flash('dataAdded',"Successfully Added");
        }
        catch (\Exception $e){
            session()->flash('dataError',"Failed to Add");
        }
    }

    public function click_item($id){
        $data = \App\Models\Inventory::find($id);
        $this->item_name = $data->item_name;
        $this->pick = 1;
    }

    public function search(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->get();
    }

    public function click_input_item(){
        $this->fa = 0;
    }

    public function not_item_click(){
        $this->fa = 1;
    }
}
