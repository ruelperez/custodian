<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\MovedItem;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WasteItem extends Component
{
    public $receiver_id, $qtyNotModel, $waste_id, $unitNotModel, $movedData, $qty, $unit, $item_name, $teacher_name, $receiver_name, $deployed_data, $ff=0, $hover_id;

    public function render()
    {
        if ($this->qty != ""){
            $this->qtyValidator();
        }
        if ($this->unit != ""){
            $this->unitValidator();
        }
        $this->displayData();
        $this->displayMoved();
        return view('livewire.waste-item');
    }

    public function qtyValidator(){
        if (!is_numeric($this->qty)){
            session()->flash('notNumber',"Input numbers only");
        }
        elseif ($this->qtyNotModel >= $this->qty){

        }
        else{
            session()->flash('failed', $this->qtyNotModel." quantity available");
        }
    }

    public function unitValidator(){
        if (!is_numeric($this->unit)){
            session()->flash('notNumberUnit',"Input numbers only");
        }
        elseif ($this->unitNotModel >= $this->unit){

        }
        else{
            session()->flash('failedUnit', $this->unitNotModel." quantity available");
        }
    }

    public function mount($teacher_id){
       $this->receiver_id = $teacher_id;
    }

    public function displayData(){
        $this->teacher_name = Receiver::find($this->receiver_id);
        $this->receiver_name = $this->teacher_name->fullname;
        $this->deployed_data = BackupPrepare::where('receiver','=', $this->teacher_name->fullname)
            ->where('item_type', '!=', 'consumable')
            ->get();
    }

    public function displayMoved(){
        $this->movedData = MovedItem::where('receiver', $this->receiver_name)->get();
    }

    public function handleMouseOver($id){
        $this->hover_id = $id;
        $this->ff = 1;
    }

    public function mouseOut(){
        $this->ff = 0;
    }

    public function clickMove($id){
        $data = BackupPrepare::find($id);
        MovedItem::create([
            'item_name' => $data->item_name,
            'quantity' => $data->quantity,
            'unit' => $data->unit,
            'receiver' => $data->receiver,
            'item_type' => $data->item_type,
            'serial' => $data->serial,
            'created_at' => $data->created_at,

        ]);
        BackupPrepare::find($id)->delete();
    }

    public function clickMoveBack($id){
        $data = MovedItem::find($id);
        BackupPrepare::create([
            'item_name' => $data->item_name,
            'quantity' => $data->quantity,
            'unit' => $data->unit,
            'receiver' => $data->receiver,
            'item_type' => $data->item_type,
            'serial' => $data->serial,
            'created_at' => $data->created_at,
        ]);
        MovedItem::find($id)->delete();
    }

    public function clickArrow($id){
        $data = BackupPrepare::find($id);
        $this->item_name = $data->item_name;
        $this->waste_id = $id;
        $this->qtyNotModel = $data->quantity;
        $this->unitNotModel = $data->unit;
    }

    public function submitMove(){
        if ($this->qtyNotModel >= $this->qty){
            $data = BackupPrepare::find($this->waste_id);
            $newQty = $data->quantity - $this->qty;
            $data->quantity = $newQty;
            $data->save();
        }
        else{
            session()->flash('failed',"Insufficient");
        }
    }

}
