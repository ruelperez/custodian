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
    public $prepare_data, $mas=0, $components, $officer, $reference, $proBtn="par", $rt=1, $itemStats, $par_num, $prop_num, $date, $date_acquired, $transaction_name, $total_cost = 0, $clickAdd, $position, $ics, $unit_cost, $ics_last_number, $currentQty, $sample=0, $results, $serial, $search_data, $hh=0, $ids, $fa=0, $receiver_disable = 0, $item_disable = 0, $item_name, $basin=0, $result, $picks=0, $fas=0, $receiver, $basis=0, $pick=0, $unit, $quantity, $item_type="consumable";

    public function render()
    {

        $this->getIcsNum();
        if ($this->clickAdd === "supply"){
            $this->supply();
        }
        elseif ($this->clickAdd === "property_ics"){
            $this->propertyIcs();
        }
        elseif ($this->clickAdd == "par"){
            $this->par();
        }
        elseif ($this->clickAdd == "property"){
            $this->property();
        }

        $this->prepare_data = \App\Models\Prepare::all();
        return view('livewire.prepare');
    }

    public function property(){

        if ($this->fas == 0){
            if ($this->receiver != "" and $this->picks == 1){
                $this->basin = 0;
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
            }
            elseif ($this->item_name != ""){
                $this->propertySearchItem();
            }
            else{
                $this->basis = 0;
            }
        }
    }

    public function propertySearchItem(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->where('item_type','=','sets')
//            ->where('unit_cost', '>', 50000)
            ->get();
        if (count($this->result) == 0){
            $this->basis = 0;
        }
        else{
            $this->basis = 1;
        }
    }
    public function par(){
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
                $this->parSearchItem();
            }
            else{
                $this->basis = 0;
            }
        }
    }

    public function parSearchItem(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->where('item_type','=','non-consumable')
            ->where('unit_cost', '>', 50000)
            ->get();
        if (count($this->result) == 0){
            $this->basis = 0;
        }
        else{
            $this->basis = 1;
        }
    }



    public function clickIcs(){
        $this->rt = 1;
        $this->clickAdd = "property_ics";
        $this->transaction_name = "property_ics";
        $this->clearInput();
    }
    public function clickPar(){
        $this->rt = 0;
        $this->clickAdd = $this->proBtn;
        $this->transaction_name = $this->proBtn;
        $this->clearInput();
    }

    public function clickParBtn(){
        $this->clickAdd = "par";
        $this->transaction_name = "par";
        $this->clearInput();
    }

    public function clickPropBtn(){
        $this->clickAdd = "property";
        $this->transaction_name = "property";
        $this->clearInput();
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
        $this->item_name = "";
        $this->quantity = "";
        $this->position = "";
        $this->receiver = "";
        $this->unit = "";
        $this->unit_cost = "";
        $this->par_num = "";
        $this->total_cost = "";
        $this->item_disable = 0;
        $this->receiver_disable = 0;
        $this->date = "";
        $this->prop_num = "";

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
                $this->result = [];
            }
            elseif ($this->item_name != ""){
                $this->basis = 1;
                $this->search();
            }
            else{
                $this->basis = 0;
                $this->result = [];
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

        if ($field === 'par_num'){
            $gg =  \App\Models\Prepare::all();
            $cnt = count($gg) + 1;
            $this->prop_num = $this->par_num.'-'.$cnt;
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
                    'ppe' => $this->components,
                    'prop_num' => $this->prop_num,
                    'par_num' => $this->par_num,
                    'date_acquired' => $this->date_acquired,
                    'reference' => $this->reference,
                    'officer' => $this->officer,
                    'amount' => $this->total_cost,
                ]);

                $this->item_name = "";
                $this->quantity = "";
                $this->unit = "";
                $this->receiver_disable = 0;
                $this->item_disable = 0;
                $this->unit_cost = "";
                $this->components = "";
                $this->prop_num = "";
                $this->reference = "";
                $this->officer = "";
                $this->total_cost = 0;
                $this->date_acquired = "";
                $this->par_num = "";
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
                    'total_cost' => $this->total_cost,
                    'ppe' => $this->components,
                    'prop_num' => $this->prop_num,
                    'par_num' => $this->par_num,
                    'date_acquired' => $this->date_acquired,
                    'reference' => $this->reference,
                    'officer' => $this->officer,
                    'amount' => $this->total_cost,
                ]);
                $this->item_name = "";
                $this->quantity = "";
                $this->unit = "";
                $this->receiver_disable = 0;
                $this->item_disable = 0;
                $this->unit_cost = "";
                $this->components = "";
                $this->prop_num = "";
                $this->reference = "";
                $this->officer = "";
                $this->date = "";
                $this->total_cost = 0;
                $this->date_acquired = "";
                $this->par_num = "";
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
        $this->components = $data->components;
        $this->prop_num = $data->prop_num;
        $this->par_num = $data->par_num;
        $this->reference = $data->reference;
//        $this->quantity = $data->quantity;
        $this->officer = $data->office;
        $this->date_acquired = $data->date;
        if ($this->transaction_name == "supply"){
            $this->supplyInvNum();
        }
        elseif ($data->inventory_number != 0 and $data->item_status != ""){
            $this->serial = $data->inventory_number;
        }
        else{
            $this->icsInvNum();
        }
        $this->basis = 0;
        $this->basin = 0;
        $this->item_disable = 1;
        $this->pick = 1;
        $this->result = [];
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
        }
        else{
            $this->basis = 1;
        }
    }

    public function icsSearchItem(){
        $this->result = DB::table('inventories')
            ->where('item_name','LIKE', '%'.$this->item_name.'%')
            ->where('item_type','=','non-consumable')
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
        $this->pick = 0;
    }

    public function click_input_items(){
        $this->fas = 0;
        $this->fa = 1;
        $this->receiver_disable = 0;
        $this->picks = 0;
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
                            'property_num' => $datas->prop_num,
                            'position' => $datas->position,
                            'ppe' => $datas->ppe,
                            'reference' => $datas->reference,
                            'officer' => $datas->officer,
                            'dates' => $datas->date_acquired,
                        ]);
                    }
                    elseif($datas->item_type == "supply"){
                        \App\Models\StockCard::create([
                            'item_name' => $datas->item_name,
                            'quantity' => $datas->quantity,
                            'unit' => $datas->unit,
                            'receiptQty' => $in->quantity,
                            'receiver' => $datas->receiver,
                            'inventory_id' => $in->id,
                            'unit_cost' => $datas->unit_cost,
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
                        'parnum' => $dat->par_num,
                        'property_num' => $dat->prop_num,
                        'date_acquired' => $dat->date_acquired,
                        'amount' => $dat->amount,
                        'position' =>$dat->position
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
                    'prop_num' => $dat->prop_num,
                    'par_num' => $dat->par_num,
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

                $iry = \App\Models\Inventory::where('item_name','=',$dat->item_name)->get();
                if (count($iry) > 0){
                    foreach ($iry as $irys){
                        $irys->receiver = $dat->receiver;
                        $irys->save();
                    }
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
