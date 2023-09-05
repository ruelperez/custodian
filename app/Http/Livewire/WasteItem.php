<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\MovedItem;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WasteItem extends Component
{
    public $receiver_id, $movedData, $teacher_name, $receiver_name, $deployed_data, $ff=0, $hover_id;

    public function render()
    {
        $this->displayData();
        $this->displayMoved();
        return view('livewire.waste-item');
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
}
