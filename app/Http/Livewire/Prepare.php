<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Distribute;
use App\Models\Receiver;
use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Prepare extends Component
{
    public $prepare_data, $ics, $unit_cost, $ics_last_number, $currentQty, $sample=0, $results, $serial, $search_data, $hh=0, $ids, $fa=0, $receiver_disable = 0, $item_disable = 0, $item_name, $basin=0, $result, $picks=0, $fas=0, $receiver, $basis=0, $pick=0, $unit, $quantity, $item_type="consumable";

    public function render()
    {

        $this->getIcsNum();
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

    public function updated($field)
    {
        if ($field === 'quantity') {
            $this->fa = 1;
            $this->fas = 1;
            $this->basis = 0;
            $this->basin = 0;
        }
        if ($field === 'item_name'){
            $this->fa = 0;
            $this->fas = 1;
            $this->item_disable = 0;
        }
        if ($field === 'receiver'){
            $this->fas = 0;
            $this->fa = 1;
            $this->receiver_disable = 0;
        }

    }

    public function getIcsNum(){
        $lastId = BackupPrepare::latest('ics_last')->first();
        if ($lastId) {
            $nextId = $lastId->ics_last + 1;
        } else {
            $nextId = 1;
        }
        $this->ics_last_number = $nextId;
        $r = date('Y-m-');
        $this->ics = $r.$nextId;
    }

    public function submit(){

        $data = $this->validate([
            'item_name' => 'required',
        ]);
        $move = \App\Models\Prepare::all();
        foreach ($move as $data){
            $it = $data->receiver;
        }
        if (count($move) == 0){

            if ($this->quantity == ""){
                $this->quantity = 0;
            }

            if ($this->quantity > $this->currentQty){
                session()->flash('insufficient',"Insufficient item quantity");
                return;
            }

            try {
                \App\Models\Prepare::create([
                    'item_name' => $this->item_name,
                    'quantity' => $this->quantity,
                    'unit' => $this->unit,
                    'unit_cost' => $this->unit_cost,
                    'item_type' => $this->item_type,
                    'receiver' => $this->receiver,
                    'serial' => $this->serial,
                    'ics' => $this->ics,
                ]);
                $this->item_name = "";
                $this->quantity = "";
                $this->unit = "";
                $this->serial = "";
                $this->receiver_disable = 0;
                $this->item_disable = 0;
                $this->unit_cost = "";
                session()->flash('dataAdded',"Successfully Added");
            }
            catch (\Exception $e){
                session()->flash('dataError',"Failed to Add");
            }
        }
        elseif ($it != $this->receiver){
            $this->receiver_disable = 0;
            $this->item_disable = 0;
            session()->flash('different',"Deploy first before adding different name");
        }
        else{
            if ($this->quantity == ""){
                $this->quantity = 0;
            }

            if ($this->quantity > $this->currentQty){
                session()->flash('insufficient',"Insufficient item quantity");
            }

            try {
                \App\Models\Prepare::create([
                    'item_name' => $this->item_name,
                    'quantity' => $this->quantity,
                    'unit' => $this->unit,
                    'unit_cost' => $this->unit_cost,
                    'item_type' => $this->item_type,
                    'receiver' => $this->receiver,
                    'serial' => $this->serial,
                    'ics' => $this->ics,
                ]);
                $this->item_name = "";
                $this->quantity = "";
                $this->unit = "";
                $this->serial = "";
                $this->receiver_disable = 0;
                $this->item_disable = 0;
                $this->unit_cost = "";
                session()->flash('dataAdded',"Successfully Added");
            }
            catch (\Exception $e){
                session()->flash('dataError',"Failed to Add");
            }
        }

    }

    public function click_item($id){
        $data = \App\Models\Inventory::find($id);
        $this->item_name = $data->item_name;
        $this->unit = $data->unit;
        $this->unit_cost = $data->unit_cost;
        $this->item_type = $data->item_type;
        $this->currentQty = $data->quantity;
        $this->basis = 0;
        $this->basin = 0;
        $this->item_disable = 1;
        $this->pick = 1;
    }
    public function click_items($id){
        $data = Receiver::find($id);
        $this->receiver = $data->fullname;
        $this->picks = 1;
        $this->basis = 0;
        $this->receiver_disable = 1;
        $this->basin = 0;
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
        $this->item_disable = 0;
    }

    public function click_input_items(){
        $this->fas = 0;
        $this->fa = 1;
        $this->receiver_disable = 0;
    }

    public function not_item_click(){
        $this->fa = 1;
        $this->fas = 1;
        $this->basis = 0;
        $this->basin = 0;
    }

    public function delete($id){
        \App\Models\Prepare::find($id)->delete();
    }

    public function edit($id){
        $this->ids = $id;
        $this->basin = 0;
        $this->basis = 0;
        $this->fas = 1;
        $this->fa = 1;
        $data = \App\Models\Prepare::find($id);
        $this->receiver = $data->receiver;
        $this->item_name = $data->item_name;
        $this->quantity = $data->quantity;
        $this->unit = $data->unit;
        $this->item_type = $data->item_type;
    }

    public function submit_edit(){
        $data = $this->validate([
            'item_name' => 'required',
        ]);
        if ($this->quantity == ""){
            $this->quantity = 0;
        }
        if ($this->unit == ""){
            $this->unit = 0;
        }

        try {
            $prep = \App\Models\Prepare::find($this->ids);
            $prep->receiver = $this->receiver;
            $prep->item_name = $this->item_name;
            $prep->quantity = $this->quantity;
            $prep->unit = $this->unit;
            $prep->item_type = $this->item_type;
            $prep->serial = $this->serial;
            $prep->save();
            $this->item_name = "";
            $this->quantity = "";
            $this->unit = "";
            $this->item_type = "consumable";
            $this->receiver = "";
            session()->flash('dataAdded',"Successfully Updated");
        }
        catch (\Exception $e){
            session()->flash('dataError',"Failed to Update");
        }
    }

    public function deploy(){
        $f=0;
        $this->hh = 1;
        $data = \App\Models\Prepare::all();
        foreach ($data as $datas){
            $inv = \App\Models\Inventory::where('item_name',$datas->item_name)->get();
            if (count($inv) > 0){
                foreach ($inv as $in){
                    if ($datas->item_type == "sets"){
                        \App\Models\PropertyCard::create([
                            'item_name' => $datas->item_name,
                            'unit' => $datas->unit,
                            'quantity' => $datas->quantity,
                            'receiptQty' => $in->quantity,
                            'receiver' => $datas->receiver,
                            'inventory_id' => $in->id,
                        ]);
                    }
                    else{
                        \App\Models\StockCard::create([
                            'item_name' => $datas->item_name,
                            'quantity' => $datas->quantity,
                            'unit' => $datas->unit,
                            'receiptQty' => $in->quantity,
                            'receiver' => $datas->receiver,
                            'inventory_id' => $in->id,
                        ]);
                    }

                }
                try {
                    \App\Models\Inventory::where('item_name',$datas->item_name)->decrement('quantity',$datas->quantity);
                    session()->flash('good',"good");
                    $f = 1;
                }
                catch (\Exception $e){
                    session()->flash('bad',"bad");
                    $f = 0;
                }

            }
        }
        if ($f == 1){
            foreach ($data as $dat){
                BackupPrepare::create([
                    'item_name' => $dat->item_name,
                    'quantity' => $dat->quantity,
                    'unit' => $dat->unit,
                    'unit_cost' => $dat->unit_cost,
                    'item_type' => $dat->item_type,
                    'receiver' => $dat->receiver,
                    'serial' => $dat->serial,
                    'ics' => $dat->ics,
                    'ics_last' => $this->ics_last_number,
                ]);

                Distribute::create([
                    'item_name' => $dat->item_name,
                    'quantity' => $dat->quantity,
                    'unit' => $dat->unit,
                    'unit_cost' => $dat->unit_cost,
                    'item_type' => $dat->item_type,
                    'receiver' => $dat->receiver,
                    'serial' => $dat->serial,
                    'ics' => $dat->ics,
                    'ics_last' => $this->ics_last_number,
                ]);

                $accepter = DB::table('receivers')
                    ->where('fullname','=', $dat->receiver)
                    ->get();
                if (count($accepter) == 0){
                    Receiver::create(['fullname' => $dat->receiver]);
                }
            }

            foreach ($data as $da){
                \App\Models\Prepare::find($da->id)->delete();
            }

        }
        $this->item_name = "";
        $this->quantity = "";
        $this->unit = "";
        $this->serial = "";
        $this->receiver_disable = 0;
        $this->item_disable = 0;
        $this->unit_cost = "";

    }

    public function clickReport($name){
        $this->sample = $name;
    }

    protected $listeners = [
        'clickBack40' => 'back',
        'removeSuggestTeacher' => 'rst',
        'removeSuggestItem' => 'rsi',
    ];

    public function rst(){
        $this->basin = 0;
    }

    public function rsi()
    {
        $this->basis = 0;
    }

    public function back(){
        $this->sample = 0;
    }
}
