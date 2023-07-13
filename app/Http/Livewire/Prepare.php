<?php

namespace App\Http\Livewire;

use App\Models\Receiver;
use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Prepare extends Component
{
    public $prepare_data, $results, $search_data, $fa=0, $item_name, $basin=0, $result, $picks=0, $fas=0, $receiver, $basis=0, $pick=0, $unit, $quantity, $item_type="consumable";

    public function render()
    {

        if ($this->fas == 0){
            if ($this->receiver != "" and $this->picks == 1){
                $this->basin = 0;
                $this->picks = 0;
            }
            elseif ($this->receiver != ""){
                $this->searchs();
            }
            else{
                $this->basin = 0;
            }
        }

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
        ]);

        if ($this->unit == ""){
            $this->unit = 0;
        }
        if ($this->quantity == ""){
            $this->quantity = 0;
        }

        try {

            \App\Models\Prepare::create([
                'item_name' => $this->item_name,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'item_type' => $this->item_type,
                'receiver' => $this->receiver,
            ]);
            $this->item_name = "";
            $this->quantity = "";
            $this->unit = "";
            $this->item_type = "consumable";
            $this->receiver = "";
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
    public function click_items($id){
        $data = Receiver::find($id);
        $this->receiver = $data->fullname;
        $this->picks = 1;
    }

    public function search(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->get();
        if (count($this->result) == 0){
            $this->basis = 0;
        }
        else{
            $this->basis = 1;
        }
    }

    public function searchs(){
        $this->results = DB::table('receivers')
            ->where('fullname','LIKE', '%'.$this->receiver.'%')
            ->get();
        if (count($this->results) == 0){
            $this->basin = 0;
        }
        else{
            $this->basin = 1;
        }
    }

    public function click_input_item(){
        $this->fa = 0;
        $this->fas = 1;
    }

    public function click_input_items(){
        $this->fas = 0;
        $this->fa = 1;
    }

    public function not_item_click(){
        $this->fa = 1;
        $this->fas = 1;
        $this->basis = 0;
        $this->basin = 0;
    }
}
