<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inventory extends Component
{
    public $request_data, $searchInput, $result, $item_name, $unit_cost, $quantity, $data_id, $inventory_number, $unit,
            $item_type, $ng=0, $kl = 0;

    public function render()
    {
        if ($this->item_name != ""){
            $this->itemValidator();
        }

        if ($this->searchInput != ""){
            $this->search();
        }
        else{
            $this->request_data = \App\Models\Inventory::all();
        }


        return view('livewire.inventory');
    }

    public function itemValidator(){
        $count = 0;
        $data = \App\Models\Inventory::all();
        foreach ($data as $datas){
            if ($datas->item_name == $this->item_name){
                $count++;
            }
        }
        if ($count > 0){
            $this->kl = 1;
        }
        else{
            $this->kl = 0;
        }
    }

    public function search(){
        $this->request_data = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->searchInput.'%')
            ->get();
    }

    public function submit()
    {
        $data = $this->validate([
            'item_name' => 'required|unique:inventories,item_name',
            'item_type' => 'required',
            'quantity' => 'required|integer',
            'unit_cost' => 'integer',
        ]);
        if ($this->unit == "") {
            $this->unit = 0;
        }
        if ($this->quantity == "") {
            $this->quantity = 0;
        }
        if ($this->inventory_number == "") {
            $this->inventory_number = 0;
        }
        if ($this->unit_cost == "") {
            $this->unit_cost = 0;
        }
        try {
            \App\Models\Inventory::create([
                'item_name' => $this->item_name,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'unit_cost' => $this->unit_cost,
                'inventory_number' => $this->inventory_number,
                'item_type' => $this->item_type,
            ]);
            $this->item_name = "";
            $this->quantity = "";
            $this->unit = "";
            $this->inventory_number = "";
            $this->item_type = "";
            $this->unit_cost = "";
            session()->flash('dataAdded', "Successfully Added");
            Logs::create([
                'name' => auth()->user()->username,
                'action' => 'Add Item on Inventory'
            ]);
        } catch (\Exception $e) {
            session()->flash('dataError', "Failed to Add");
        }
    }

    protected $listeners = [
        'deleteInv' => 'delete'
    ];

    public function delete($id)
    {
        \App\Models\Inventory::find($id)->delete();
        Logs::create([
            'name' => auth()->user()->username,
            'action' => 'Delete Item on Inventory'
        ]);
    }

    public function edit($id)
    {
        $this->data_id = $id;
        $data = \App\Models\Inventory::find($id);
        $this->unit = $data->unit;
        $this->unit_cost = $data->unit_cost;
        $this->total_cost = $data->total_cost;
        $this->quantity = $data->quantity;
        $this->item_name = $data->item_name;
        $this->inventory_number = $data->inventory_number;
        $this->estimated = $data->estimated;
        $this->item_type = $data->item_type;
    }

    public function edit_submit()
    {
        $data = \App\Models\Inventory::find($this->data_id);
        if ($this->unit == "") {
            $this->unit = 0;
        }
        if ($this->unit_cost == "") {
            $this->unit_cost = 0;
        }
        if ($this->inventory_number == "") {
            $this->inventory_number = 0;
        }
        try {
            $data->unit = $this->unit;
            $data->quantity = $this->quantity;
            $data->item_name = $this->item_name;
            $data->item_type = $this->item_type;
            $data->unit_cost = $this->unit_cost;
            $data->inventory_number = $this->inventory_number;
            $data->save();
            $this->item_name = "";
            $this->quantity = "";
            $this->unit_cost = "";
            $this->unit = null;
            $this->inventory_number = null;
            $this->item_type = "";
            session()->flash('dataUpdated', "Successfully Updated");
            Logs::create([
                'name' => auth()->user()->username,
                'action' => 'Edit Item on Inventory'
            ]);
        } catch (\Exception $e) {
            session()->flash('errorUpdated', "Failed to Update");
        }

    }

}
