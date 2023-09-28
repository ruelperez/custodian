<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Receiver;
use Livewire\Component;

class TeacherItem extends Component
{
    public $receiver_id, $qtyPass = 0, $sort1 = "item_name", $sort2 = "desc", $qtyNotModel, $waste_id, $unit, $movedData, $qty = 0, $item_name, $teacher_name, $receiver_name, $deployed_data, $ff=0, $hover_id;


    public function render()
    {
        $this->displayData();
        return view('livewire.teacher-item');
    }

    public function mount($teacherName){
        $this->teacher_name = $teacherName;
    }

    public function displayData(){
        $this->deployed_data = BackupPrepare::where('receiver','=', $this->teacher_name)
            ->where('item_type', '!=', 'consumable')
            ->orderBy($this->sort1,$this->sort2)
            ->get();
    }

    public function clickSort1($name){
        $this->sort1 = $name;
    }

    public function clickSort2($name){
        $this->sort2 = $name;
    }
}
