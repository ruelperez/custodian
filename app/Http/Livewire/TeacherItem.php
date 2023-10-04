<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
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
        $this->suggestData = \App\Models\Inventory::where('item_name','LIKE', '%'.$this->item_name.'%')
            ->get();
    }

    public function displayData(){
        $this->deployed_data = BackupPrepare::where('receiver','=', $this->teacher_name)
            ->where('item_type', '!=', 'consumable')
            ->orderBy($this->sort1,$this->sort2)
            ->get();
    }

    protected $listeners = [
        'input_change' => 'inputChange',
    ];

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

    public function inputChange(){
        dd('baba');
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
            ]);
            $this->item_name = "";
            $this->quantity = "";
            $this->unit = "";
            $this->serial = "";
            session()->flash('success',"Successfully add item");
        }
        catch (\Exception $e){
            session()->flash('failed',"Failed to add item");
        }
    }

}
