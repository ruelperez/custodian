<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Log;
use App\Models\Receiver;
use Livewire\Component;

class TeacherItem extends Component
{
    public $receiver_id, $month = "1", $day = "1", $year, $quantity, $serial, $item_type = "non-consumable",  $suggestData = [], $qtyPass = 0, $sort1 = "item_name", $sort2 = "desc", $qtyNotModel, $waste_id, $unit, $movedData, $qty = 0, $item_name, $teacher_name, $receiver_name, $deployed_data, $ff=0, $hover_id;


    public function render()
    {
        $this->displayData();
        return view('livewire.teacher-item');
    }

    public function mount($teacherName){
        $this->teacher_name = $teacherName;

    }

    public function suggestion(){
        if ($this->item_name != ""){
            $this->suggestData = \App\Models\Inventory::where('item_name','LIKE', '%'.$this->item_name.'%')
                ->where('item_type','=',"non-consumable")
//                ->where('unit_cost', '<', 50000)
                ->get();
        }
        else{
            $this->suggestData = [];
        }

    }

    public function displayData(){
        $this->deployed_data = BackupPrepare::where('receiver','=', $this->teacher_name)
            ->where('transaction_name', '=', 'property_ics')
            ->orderBy($this->sort1,$this->sort2)
            ->get();
    }

    protected $listeners = [
        'input_change' => 'inputChange',
        'moves' => 'moveToInventory',
    ];

    public function moveToInventory(){
        $this->gk = 1;
        foreach ($this->deployed_data as $data){
            try {
                $tt = \App\Models\Inventory::where('item_name',$data->item_name)->increment('quantity',$data->quantity);
                if ($tt == 0){
                    \App\Models\Inventory::create([
                        'item_name' => $data->item_name,
                        'quantity' => $data->quantity,
                        'unit' => $data->unit,
                        'item_type' => $data->item_type,
                        'inventory_number' => 0,
                    ]);
                }
                session()->flash('transfer',"Successfully  Moved to Inventory");
                Log::create([
                    'name' => auth()->user()->username,
                    'action' => 'Move to Inventory from Teacher deployed Item'
                ]);
            }
            catch (\Exception $e){
                session()->flash('failed',"Failed to Move");
            }
        }

        foreach ($this->deployed_data as $ord){
            BackupPrepare::find($ord->id)->delete();
        }
        $rec = Receiver::where('fullname','=',$this->teacher_name)
            ->get('id');
        foreach ($rec as $recs){
            Receiver::find($recs->id)->delete();
        }

    }
    public function updated($field)
    {
        if ($field === 'item_name') {
            $this->suggestion();
        }
        if ($field === 'quantity'){
           $this->validate([
               'quantity' => 'numeric'
           ]);
        }
        if ($field === 'year'){
            $this->validate([
                'year' => 'integer'
            ]);
        }
    }
    public function clickSort1($name){
        $this->sort1 = $name;
    }

    public function clickSort2($name){
        $this->sort2 = $name;
    }

    public function itemInputChange(){
        dd('vava');
    }

    public function add_request_click(){

    }

    public function click_item($id){
        $this->item_name = \App\Models\Inventory::find($id)->item_name;
        $this->unit = \App\Models\Inventory::find($id)->unit;
        $this->suggestData = [];
    }

    public function submit(){
        $this->validate([
            'quantity' => 'numeric',
            'year' => 'integer'
        ]);
        $date = $this->year."-".$this->month."-".$this->day;

        try {
            BackupPrepare::create([
                'item_name' => $this->item_name,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'item_type' => $this->item_type,
                'receiver' => $this->teacher_name,
                'created_at' => $date,
                'serial' => $this->serial,
                'transaction_name' => 'property_ics'
            ]);
            $this->item_name = "";
            $this->quantity = "";
            $this->unit = "";
            $this->serial = "";
            session()->flash('success',"Successfully add item");
            Log::create([
                'name' => auth()->user()->username,
                'action' => 'Add Item on Teachers Deployed Item'
            ]);
        }
        catch (\Exception $e){
            session()->flash('failed',"Failed to add item");
        }
    }

    public function print(){
        Log::create([
            'name' => auth()->user()->username,
            'action' => 'Print Item on Teachers Deployed Item'
        ]);
    }

}
