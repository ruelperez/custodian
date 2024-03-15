<?php

namespace App\Http\Livewire;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inventory extends Component
{
    public $request_data, $selectItemType = "non-consumable", $searchInput, $result, $item_name, $unit_cost, $quantity, $data_id, $inventory_number, $unit,
            $item_type = "non-consumable", $ng=0, $kl = 0, $components, $prop_num, $reference, $office, $date;

    public function render()
    {
        if ($this->item_name != ""){
            $this->itemValidator();
        }

        if ($this->searchInput != ""){
            $this->search();
        }
        else{
            $this->request_data = \App\Models\Inventory::where('item_type','=',$this->selectItemType)->get();
        }

        return view('livewire.inventory');
    }
    public function itemValidator(){
        $count = 0;
        $data = \App\Models\Inventory::all();
        foreach ($data as $datas){
            if (strcasecmp($datas->item_name, $this->item_name) == 0){
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
            ->orWhere('receiver','LIKE', '%'.$this->searchInput.'%')
//            ->where('item_status','!=', 'transferred')
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
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Add Item on Inventory'
            ]);
        } catch (\Exception $e) {
            session()->flash('dataError', "Failed to Add");
        }
    }

    public function submit_sets(){
        $data = $this->validate([
            'item_name' => 'required|unique:inventories,item_name',
            'quantity' => 'required|integer',
        ]);

        if ($this->quantity == "") {
            $this->quantity = 0;
        }

        try {
            \App\Models\Inventory::create([
                'item_name' => $this->item_name,
                'components' => $this->components,
                'prop_num' => $this->prop_num,
                'reference' => $this->reference,
                'quantity' => $this->quantity,
                'office' => $this->office,
                'date' => $this->date,
                'item_type' => $this->item_type,
                'unit' => "none",
                'inventory_number' => "none",
                'unit_cost' => 0,
            ]);
            $this->item_name = "";
            $this->components = "";
            $this->prop_num = "";
            $this->reference = "";
            $this->quantity = "";
            $this->office = "";
            $this->date = "";
            session()->flash('dataAdded_sets', "Successfully Added");
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Add Item on Inventory'
            ]);
        } catch (\Exception $e) {
            session()->flash('dataError_sets', "Failed to Add");
        }
    }

    protected $listeners = [
        'deleteInv' => 'delete'
    ];

    public function delete($id)
    {
        \App\Models\Inventory::find($id)->delete();
        Log::create([
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

    public function edit_sets($id){
        $this->data_id = $id;
        $data = \App\Models\Inventory::find($id);
        $this->item_name = $data->item_name;
        $this->components = $data->components;
        $this->prop_num = $data->prop_num;
        $this->reference = $data->reference;
        $this->quantity = $data->quantity;
        $this->office = $data->office;
//        $this->date = $data->date;
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
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Edit Item on Inventory'
            ]);
        } catch (\Exception $e) {
            session()->flash('errorUpdated', "Failed to Update");
        }

    }

    public function edit_submit_sets(){
        $data = \App\Models\Inventory::find($this->data_id);
        try {
            $data->components = $this->components;
            $data->prop_num = $this->prop_num;
            $data->reference = $this->reference;
            $data->quantity = $this->quantity;
            $data->office = $this->office;
            $data->date = $this->date;
            $data->item_name = $this->item_name;
            $data->save();
            $this->item_name = "";
            $this->components = "";
            $this->reference = "";
            $this->prop_num = "";
            $this->quantity = "";
            $this->office = "";
            $this->date = "";
            session()->flash('dataUpdated_sets', "Successfully Updated");
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Edit Item on Inventory'
            ]);
        } catch (\Exception $e) {
            session()->flash('errorUpdated_sets', "Failed to Update");
        }
    }

}
