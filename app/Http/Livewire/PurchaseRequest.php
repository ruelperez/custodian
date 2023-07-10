<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Request;
use Livewire\Component;

class PurchaseRequest extends Component
{
    public $item_name, $order_data, $quantity, $request_data, $unit, $unit_cost, $total_cost, $data_id, $base=0;

    public function render()
    {
        $this->request_data = Request::where('isRemove','0')->get();
        $this->order_data = Order::where('isRemove','0')->get();
        return view('livewire.purchase-request');
    }

    public function submit(){
        $data = $this->validate([
            'item_name' => 'required',
            'quantity' => 'integer',
        ]);
        if ($this->unit == ""){
            $this->unit = null;
        }
        if ($this->unit_cost == ""){
            $this->unit_cost = null;
        }
        if ($this->total_cost == ""){
            $this->total_cost = null;
        }
        try {
            Request::create([
                'item_name' => $this->item_name,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'unit_cost' => $this->unit_cost,
                'total_cost' => $this->total_cost,
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

    public function delete($id){
        Request::find($id)->delete();
    }

    public function edit($id){
        $this->base = 0;
        $sae = Request::find($id);
        $this->data_id = $sae->id;
        $this->unit = $sae->unit;
        $this->quantity = $sae->quantity;
        $this->unit_cost = $sae->unit_cost;
        $this->total_cost = $sae->total_cost;
        $this->item_name = $sae->item_name;
    }

    public function edit_submit(){
        if ($this->base == 0){
            $data = Request::find($this->data_id);
            try {
                $data->unit = $this->unit;
                $data->quantity = $this->quantity;
                $data->unit_cost = $this->unit_cost;
                $data->total_cost = $this->total_cost;
                $data->item_name = $this->item_name;
                $data->save();
                $this->item_name = "";
                $this->quantity = "";
                $this->unit_cost = null;
                $this->total_cost = null;
                $this->unit = null;
                session()->flash('dataUpdated',"Successfully Updated");
            }
            catch (\Exception $e){
                session()->flash('errorUpdated',"Failed to Update");
            }
        }
        elseif ($this->base == 1){
            $data = Order::find($this->data_id);
            try {
                $data->unit = $this->unit;
                $data->quantity = $this->quantity;
                $data->unit_cost = $this->unit_cost;
                $data->total_cost = $this->total_cost;
                $data->item_name = $this->item_name;
                $data->save();
                $this->item_name = "";
                $this->quantity = "";
                $this->unit_cost = null;
                $this->total_cost = null;
                $this->unit = null;
                session()->flash('dataUpdated',"Successfully Updated");
            }
            catch (\Exception $e){
                session()->flash('errorUpdated',"Failed to Update");
            }
        }

    }

    public function forward(){
       $request_data = Request::where('isRemove','0')->get();
       foreach ($request_data as $data){
           Order::create([
               'item_name' => $data->item_name,
               'quantity' => $data->quantity,
               'unit' => $data->unit,
               'unit_cost' => $data->unit_cost,
               'total_cost' => $data->total_cost,
           ]);
       }
    }

    public function edit_order($id){
        $this->base = 1;
        $sae = Order::find($id);
        $this->data_id = $sae->id;
        $this->unit = $sae->unit;
        $this->quantity = $sae->quantity;
        $this->unit_cost = $sae->unit_cost;
        $this->total_cost = $sae->total_cost;
        $this->item_name = $sae->item_name;
    }

    public function delete_order($id){
        Order::find($id)->delete();
    }
}
