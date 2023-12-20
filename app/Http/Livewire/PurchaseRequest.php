<?php

namespace App\Http\Livewire;

use App\Models\BackupOrder;
use App\Models\BackupRequest;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderAdditional;
use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PurchaseRequest extends Component
{
    public $supplier, $usr, $address, $clickUpdate = 1, $tin, $po_num, $mode, $total, $total_words, $item_name,$prNum, $order_data, $fa=0, $item_type="", $quantity, $pick=0, $basis=0, $result, $request_data, $unit, $unit_cost, $total_cost, $data_id, $base=0;

    public function render()
    {
        $this->usr = auth()->user()->username;
        $tr = Request::all();
        if (count($tr) > 0){
            foreach ($tr as $trd){
                $this->prNum = $trd->pr_num;
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
        if ($this->quantity != 0 and $this->unit_cost != 0 and $this->unit_cost != "" and $this->quantity != ""){
            $this->total_cost = $this->quantity * $this->unit_cost;
        }

        $this->request_data = Request::all();
        $this->order_data = Order::all();

        return view('livewire.purchase-request');
    }


    public function search(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->get();
    }

    public function submit(){
        $rr = Request::all();
        if (count($rr) == 1){
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Purchase Request, Add Item'
            ]);
        }
        if ($this->base == 0){
            $data = $this->validate([
                'item_name' => 'required',
            ]);
            if ($this->unit == ""){
                $this->unit = 0;
            }
            if ($this->quantity == ""){
                $this->quantity = 0;
            }
            if ($this->unit_cost == ""){
                $this->unit_cost = 0;
            }
            if ($this->total_cost == ""){
                $this->total_cost = 0;
            }
            try {
                Request::create([
                    'item_name' => $this->item_name,
                    'quantity' => $this->quantity,
                    'unit' => $this->unit,
                    'unit_cost' => $this->unit_cost,
                    'total_cost' => $this->total_cost,
                    'item_type' => $this->item_type,
                    'pr_num' => $this->prNum,
                ]);
                $this->item_name = "";
                $this->quantity = "";
                $this->unit_cost = "";
                $this->total_cost = "";
                $this->unit = "";
                $this->item_type = "";
                session()->flash('dataAdded',"Successfully Added");


            }
            catch (\Exception $e){
                session()->flash('dataError',"Failed to Add");
            }
        }
        elseif ($this->base == 1){
            $data = $this->validate([
                'item_name' => 'required',
            ]);
            if ($this->unit == ""){
                $this->unit = 0;
            }
            if ($this->quantity == ""){
                $this->quantity = 0;
            }
            if ($this->unit_cost == ""){
                $this->unit_cost = 0;
            }
            if ($this->total_cost == ""){
                $this->total_cost = 0;
            }
            try {
                Order::create([
                    'item_name' => $this->item_name,
                    'quantity' => $this->quantity,
                    'unit' => $this->unit,
                    'unit_cost' => $this->unit_cost,
                    'total_cost' => $this->total_cost,
                    'item_type' => $this->item_type,
                ]);
                $this->item_name = "";
                $this->quantity = "";
                $this->unit_cost = "";
                $this->total_cost = "";
                $this->unit = "";
                $this->item_type = "";
                session()->flash('dataAdded',"Successfully Added");
            }
            catch (\Exception $e){
                session()->flash('dataError',"Failed to Add");
            }
        }

    }

    public function delete($id){
        Request::find($id)->delete();
        Log::create([
            'name' => $this->usr,
            'action' => ' Delete Item on Purchase Request'
        ]);
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
        $this->item_type = $sae->item_type;
    }

    public function edit_submit(){
        if ($this->base == 0){
            $data = Request::find($this->data_id);
            if ($this->unit == ""){
                $this->unit = 0;
            }
            if ($this->unit_cost == ""){
                $this->unit_cost = 0;
            }
            if ($this->total_cost == ""){
                $this->total_cost = 0;
            }
            if ($this->quantity == ""){
                $this->quantity = 0;
            }
            try {
                $data->unit = $this->unit;
                $data->quantity = $this->quantity;
                $data->unit_cost = $this->unit_cost;
                $data->total_cost = $this->total_cost;
                $data->item_name = $this->item_name;
                $data->item_type = $this->item_type;
                $data->save();
                $this->item_name = "";
                $this->quantity = "";
                $this->unit_cost = null;
                $this->total_cost = null;
                $this->unit = null;
                $this->item_type = "";
                session()->flash('dataUpdated',"Successfully Updated");
                Log::create([
                    'name' => $this->usr,
                    'action' => 'Edit, Purchase Request'
                ]);
            }
            catch (\Exception $e){
                session()->flash('errorUpdated',"Failed to Update");
            }
        }
        elseif ($this->base == 1){
            $data = Order::find($this->data_id);
            if ($this->unit == ""){
                $this->unit = 0;
            }
            if ($this->quantity == ""){
                $this->quantity = 0;
            }
            if ($this->unit_cost == ""){
                $this->unit_cost = 0;
            }
            if ($this->total_cost == ""){
                $this->total_cost = 0;
            }
            try {
                $data->unit = $this->unit;
                $data->quantity = $this->quantity;
                $data->unit_cost = $this->unit_cost;
                $data->total_cost = $this->total_cost;
                $data->item_name = $this->item_name;
                $data->item_type = $this->item_type;
                $data->save();
                $this->item_name = "";
                $this->quantity = "";
                $this->unit_cost = null;
                $this->total_cost = null;
                $this->unit = null;
                $this->item_type = "";
                session()->flash('dataUpdatedOrder',"Successfully Updated");
                Log::create([
                    'name' => $this->usr,
                    'action' => 'Edit, Purchase Order'
                ]);
            }
            catch (\Exception $e){
                session()->flash('errorUpdatedOrder',"Failed to Update");
            }
        }

    }

    protected $listeners = [
        'move' => 'forward',
        'removeSuggest' => 'hideSuggest',
        'movetoBup' => 'move_to_backup',
        'moveToInv' => 'move_to_inventory',
        'deleteItemRequest' => 'delete',
        'deleteItemOrder' => 'delete_order',
    ];

    public function hideSuggest(){
        $this->basis = 0;
        $this->pick = 1;
//        dd($this->basis);
    }

    public function forward(){
       $request_data = Request::all();
       foreach ($request_data as $data){
           Order::create([
               'item_name' => $data->item_name,
               'quantity' => $data->quantity,
               'unit' => $data->unit,
               'unit_cost' => $data->unit_cost,
               'total_cost' => $data->total_cost,
               'item_type' => $data->item_type,
               'po_num' => $data->pr_num,
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
        $this->total_cost = $this->quantity * $this->unit_cost;
        $this->item_name = $sae->item_name;
        $this->item_type = $sae->item_type;
    }

    public function delete_order($id){
        Order::find($id)->delete();
        Log::create([
            'name' => $this->usr,
            'action' => ' Delete Item on Purchase Order'
        ]);
    }

    public function click_item($id){
        $data = \App\Models\Inventory::find($id);
        $this->item_name = $data->item_name;
        $this->unit = $data->unit;
        $this->item_type = $data->item_type;
        $this->pick = 1;
    }

    public function not_item_click(){
        $this->fa = 1;
    }

    public function click_input_item(){
        $this->fa = 0;
    }

    public function move_to_inventory(){
        $order = Order::all();

        foreach ($order as $orders){
            try {
                $tt = \App\Models\Inventory::where('item_name',$orders->item_name)->increment('quantity',$orders->quantity);

                if ($tt == 0){
                    \App\Models\Inventory::create([
                        'item_name' => $orders->item_name,
                        'quantity' => $orders->quantity,
                        'unit' => $orders->unit,
                        'unit_cost' => $orders->unit_cost,
                        'item_type' => $orders->item_type,
                        'inventory_number' => 0,
                    ]);
                }

                BackupOrder::create([
                    'item_name' => $orders->item_name,
                    'quantity' => $orders->quantity,
                    'unit' => $orders->unit,
                    'unit_cost' => $orders->unit_cost,
                    'total_cost' => $orders->total_cost,
                    'item_type' => $orders->item_type,
                ]);

                session()->flash('transfer',"Successfully  Moved to Inventory");

                Log::create([
                    'name' => auth()->user()->username,
                    'action' => 'Move to Inventory om Purchase Order'
                ]);
            }
            catch (\Exception $e){
                session()->flash('failed',"Failed to Move");
            }

        }

        foreach ($order as $ord){
            Order::find($ord->id)->delete();
        }

    }

    public function add_order_click(){
        $totalCost = 0;
        $orderData = Order::all();
        foreach ($orderData as $order){
            $totalCost += $order->total_cost;
        }
       $data = OrderAdditional::all();
        if (count($data) > 0){
            foreach ($data as $datas){
                $this->supplier = $datas->supplier;
                $this->address = $datas->address;
                $this->tin = $datas->tin;
                $this->po_num = $datas->po_num;
                $this->mode = $datas->mode;
                $this->total = $totalCost;
                $this->total_words = $datas->total_words;
            }
        }
        else{
            $this->total = $totalCost;
        }
        $this->clickUpdate = 1;

    }

    public function submit_order(){
        $order = OrderAdditional::all();
        if (count($order) > 0){
            foreach ($order as $datas){
                $datas->supplier = $this->supplier;
                $datas->address = $this->address;
                $datas->tin = $this->tin;
                $datas->po_num = $this->po_num;
                $datas->mode = $this->mode;
                $datas->total = $this->total;
                $datas->total_words = $this->total_words;
                $datas->save();
            }
        }
        else{
            OrderAdditional::create([
                'supplier' => $this->supplier,
                'address' => $this->address,
                'tin' => $this->tin,
                'po_num' => $this->po_num,
                'mode' => $this->mode,
                'total' => $this->total,
                'total_words' => $this->total_words,
            ]);
        }
        $this->clickUpdate = 1;
    }

    public function clickEdit(){
        $this->clickUpdate = 0;
    }

    public function add_request_click(){
        $this->base = 0;
        $this->item_name = "";
        $this->quantity = "";
        $this->unit_cost = null;
        $this->total_cost = null;
        $this->unit = null;
        $this->item_type = "";
    }

    public function print(){
        Logs::create([
            'name' => auth()->user()->username,
            'action' => 'Print on Purchase Request'
        ]);
    }

    public function prints(){
        Logs::create([
            'name' => auth()->user()->username,
            'action' => 'Print on Purchase Order'
        ]);
    }

    public function move_to_backup(){
        $req = Request::all();
        try {
            foreach ($req as $reqs){
                BackupRequest::create([
                    'item_name' => $reqs->item_name,
                    'quantity' => $reqs->quantity,
                    'unit' => $reqs->unit,
                    'unit_cost' => $reqs->unit_cost,
                    'total_cost' => $reqs->total_cost,
                    'item_type' => $reqs->item_type,
                    'created_at' => $reqs->created_at,
                    'pr_num' => $reqs->pr_num,
                ]);
            }
            foreach ($req as $rr){
                Request::find($rr->id)->delete();
            }
            $this->prNum = "";
            session()->flash('move',"Successfully Moved to Backup");
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Move to Backup on Purchase Request'
            ]);
        }catch (\Exception $e){
            session()->flash('move_failed',"Failed to Moved to Backup");
        }


    }
}
