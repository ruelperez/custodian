<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inventory extends Component
{
    public $request_data, $searchInput, $item_name, $quantity, $data_id, $inventory_number, $estimated, $unit, $unit_cost, $total_cost, $item_type = "consumable";

    public function render()
    {
        $this->request_data = \App\Models\Inventory::all();
        return view('livewire.inventory');
    }

    public function submit()
    {
        $data = $this->validate([
            'item_name' => 'required',
            'quantity' => 'integer',
            'item_type' => 'required',
        ]);
        if ($this->unit == "") {
            $this->unit = null;
        }
        if ($this->unit_cost == "") {
            $this->unit_cost = null;
        }
        if ($this->total_cost == "") {
            $this->total_cost = null;
        }
        if ($this->inventory_number == "") {
            $this->inventory_number = null;
        }
        if ($this->estimated == "") {
            $this->estimated = null;
        }
        try {
            \App\Models\Inventory::create([
                'item_name' => $this->item_name,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'unit_cost' => $this->unit_cost,
                'total_cost' => $this->total_cost,
                'inventory_number' => $this->inventory_number,
                'estimated' => $this->estimated,
                'item_type' => $this->item_type,
            ]);
            $this->item_name = "";
            $this->quantity = "";
            $this->unit_cost = "";
            $this->total_cost = "";
            $this->unit = "";
            $this->inventory_number = "";
            $this->estimated = "";
            $this->item_type = "consumable";
            session()->flash('dataAdded', "Successfully Added");
        } catch (\Exception $e) {
            session()->flash('dataError', "Failed to Add");
        }
    }

    public function delete($id)
    {
        \App\Models\Inventory::find($id)->delete();
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
        try {
            $data->unit = $this->unit;
            $data->quantity = $this->quantity;
            $data->unit_cost = $this->unit_cost;
            $data->total_cost = $this->total_cost;
            $data->item_name = $this->item_name;
            $data->item_type = $this->item_type;
            $data->inventory_number = $this->inventory_number;
            $data->estimated = $this->estimated;
            $data->save();
            $this->item_name = "";
            $this->quantity = "";
            $this->unit_cost = null;
            $this->total_cost = null;
            $this->unit = null;
            $this->inventory_number = null;
            $this->estimated = null;
            $this->item_type = "consumable";
            session()->flash('dataUpdated', "Successfully Updated");
        } catch (\Exception $e) {
            session()->flash('errorUpdated', "Failed to Update");
        }

    }
}
