<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Distribute;
use App\Models\Log;
use App\Models\Par;
use App\Models\Ranking;
use App\Models\Receiver;
use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Prepare extends Component
{
    public $prepare_data, $mas=0, $proBtn="par", $rt=1, $itemStats, $par_num, $prop_num, $date_acquired, $transaction_name, $total_cost, $clickAdd, $position, $ics, $unit_cost, $ics_last_number, $currentQty, $sample=0, $results, $serial, $search_data, $hh=0, $ids, $fa=0, $receiver_disable = 0, $item_disable = 0, $item_name, $basin=0, $result, $picks=0, $fas=0, $receiver, $basis=0, $pick=0, $unit, $quantity, $item_type="consumable";


    public function render()
    {

        $this->getIcsNum();
        if ($this->clickAdd === "supply"){
            $this->supply();
        }
        elseif ($this->clickAdd === "property_ics"){
            $this->propertyIcs();
        }

        $this->prepare_data = \App\Models\Prepare::all();
        return view('livewire.prepare');
    }

    public function addClick($data){
        $this->clearInput();
        $this->clickAdd = $data;
        if ($this->clickAdd == "supply"){
            $this->transaction_name = "supply";
            $this->supplyInvNum();
        }
        elseif ($this->clickAdd == "property_ics"){
            $this->transaction_name = "property_ics";
            $this->icsInvNum();
        }
    }

    public function clearInput(){
        $this->receiver="";
        $this->position="";
        $this->item_name="";
        $this->unit="";
        $this->quantity = "";
        $this->unit_cost="";
        $this->total_cost= "";
    }

    public function icsInvNum(){
        $distributeLastData = Distribute::all();
        if (count($distributeLastData) == 0) {
            $prepData = \App\Models\Prepare::where('transaction_name','property_ics')->get();
            $temp = 0 + count($prepData) + 1;
            $this->serial = $this->ics.'-'.$temp;
        }
        else{
            $prepData = \App\Models\Prepare::where('transaction_name','property_ics')->get();
            $temp = count($distributeLastData) + count($prepData) + 1;
            $this->serial = $this->ics.'-'.$temp;
        }
    }

    public function propertyIcs(){
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
                $this->icsSearchItem();
            }
            else{
                $this->basis = 0;
            }
        }
    }
    public function supply(){
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
            elseif ($this->item_name != "" and $this->pick == 0){
                $this->basis = 1;
                $this->search();
            }
            else{
                $this->basis = 0;
            }
        }
    }

    public function supplyInvNum(){
       $prepData = \App\Models\Prepare::all();
       $this->serial = count($prepData) + 1;
    }

    public function updated($field)
    {
        if ($field === 'quantity') {
            $this->validate([
                'quantity' => 'numeric'
            ]);
            $this->fa = 1;
            $this->fas = 1;
            $this->basis = 0;
            $this->basin = 0;
            if($this->unit_cost == ""){
                $this->unit_cost = 0;
            }
            if ($this->quantity == ""){
                $this->total_cost = $this->unit_cost * 0;
            }
            else{
                $this->total_cost = $this->unit_cost * $this->quantity;
            }


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
        $lastId = BackupPrepare::latest()->first();
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

        if ($this->itemStats == ""){
            $this->itemStats = null;
        }

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
                    'position' => $this->position,
                    'transaction_name' => $this->transaction_name,
                    'item_status' => $this->itemStats,
                    'par_num' => $this->par_num,
                    'prop_num' => $this->prop_num,
                    'date_acquired' => $this->date_acquired,
                ]);

                $this->item_name = "";
                $this->quantity = "";
                $this->unit = "";
                $this->receiver_disable = 0;
                $this->item_disable = 0;
                $this->unit_cost = "";
                session()->flash('dataAdded',"Successfully Added");
                Log::create([
                    'name' => auth()->user()->username,
                    'action' => 'Add Item on PMR'
                ]);
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
                    'position' => $this->position,
                    'transaction_name' => $this->transaction_name,
                    'item_status' => $this->itemStats,
                ]);
                $this->item_name = "";
                $this->quantity = "";
                $this->unit = "";
                $this->receiver_disable = 0;
                $this->item_disable = 0;
                $this->unit_cost = "";
                session()->flash('dataAdded',"Successfully Added");
                Log::create([
                    'name' => auth()->user()->username,
                    'action' => 'Add Item on PMR'
                ]);
            }
            catch (\Exception $e){
                session()->flash('dataError',"Failed to Add");
            }
        }
        if ($this->transaction_name == "supply"){
            $this->supplyInvNum();
        }
        elseif ($this->transaction_name == "property_ics"){
            $this->icsInvNum();
        }


    }

    public function click_item($id,$item_status){
        $this->itemStats = $item_status;
        $data = \App\Models\Inventory::find($id);
        if ($data->item_status == "returned"){
            $this->mas = 1;
        }
        else{
            $this->mas = 0;
        }
        $this->item_name = $data->item_name;
        $this->unit = $data->unit;
        $this->unit_cost = $data->unit_cost;
        $this->item_type = $data->item_type;
        $this->currentQty = $data->quantity;
        if ($data->inventory_number != 0 and $data->item_status != ""){
            $this->serial = $data->inventory_number;
        }
        else{
            $this->icsInvNum();
        }
        $this->basis = 0;
        $this->basin = 0;
        $this->item_disable = 1;
        $this->pick = 1;
    }
    public function click_items($id){
        $data = Receiver::find($id);
        $this->receiver = $data->fullname;
        $this->position = $data->position;
        $this->picks = 1;
        $this->basis = 0;
        $this->receiver_disable = 1;
        $this->basin = 0;
    }

    public function search(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->where('item_type','=','consumable')
            ->get();
        if (count($this->result) == 0){
            $this->basis = 0;
            $this->pick = 0;
        }
        else{
            $this->basis = 1;
        }
    }

    public function icsSearchItem(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->where('item_type','!=','consumable')
            ->where('unit_cost', '<', 50000)
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
        Log::create([
            'name' => auth()->user()->username,
            'action' => 'Delete Item on PMR'
        ]);
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
        $this->serial = $data->serial;
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
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Edit Item on PMR'
            ]);

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
                if ($datas->item_status == null or $datas->item_status == ""){
                    try {
                        \App\Models\Inventory::where('item_name',$datas->item_name)
                            ->where('item_status',null)->decrement('quantity',$datas->quantity);
                        session()->flash('good',"good");
                        $f = 1;
                    }
                    catch (\Exception $e){
                        session()->flash('bad',"bad");
                        $f = 0;
                    }
                }
                else{
                    $invData = \App\Models\Inventory::where('inventory_number',$datas->serial)->get();
                    foreach ($invData as $inv){
                        $inv->item_status = "transferred";
                        $inv->save();
                        $f = 1;
                        break;
                    }

                }

            }
        }
        if ($f == 1){
            foreach ($data as $dat){
                $rank = Ranking::where('item_name', '=', $dat->item_name)->get();
                if (count($rank) > 0){
                    Ranking::where('item_name', '=', $dat->item_name)
                        ->increment('quantity',$dat->quantity);
                }
                else{
                    Ranking::create([
                        'item_name' => $dat->item_name,
                        'quantity' => $dat->quantity,
                    ]);
                }
                $total_c = $dat->quantity * $dat->unit_cost;
                if ($total_c >= 50000 and $dat->item_type == 'non-consumable'){
                    Par::create([
                        'item_name' => $dat->item_name,
                        'quantity' => $dat->quantity,
                        'unit' => $dat->unit,
                        'unit_cost'  => $dat->unit_cost,
                        'receiver' => $dat->receiver,
                        'item_type' => $dat->item_type,
                        'serial' => $dat->serial,
                        'ics' => $dat->ics,
                        'total_cost' => $total_c,
                    ]);

                }
                elseif ($dat->transaction_name == "property_ics"){
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
                        'position' => $this->position,
                    ]);
                }

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
                    'total_cost' => $total_c,
                    'position' => $dat->position,
                    'transaction_name' => $dat->transaction_name,
                ]);

                $accepter = DB::table('receivers')
                    ->where('fullname','=', $dat->receiver)
                    ->get();
                if (count($accepter) == 0){
                    Receiver::create([
                        'fullname' => $dat->receiver,
                        'position' => $dat->position
                    ]);

                }

            }

            foreach ($data as $da){
                \App\Models\Prepare::find($da->id)->delete();
            }

        }
        $this->item_name = "";
        $this->quantity = "";
        $this->unit = "";
        $this->receiver_disable = 0;
        $this->item_disable = 0;
        $this->unit_cost = "";
        $this->receiver = "";
        $this->position = "";
        Log::create([
            'name' => auth()->user()->username,
            'action' => 'Deploy Item on PMR'
        ]);
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
