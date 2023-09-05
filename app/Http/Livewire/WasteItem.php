<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WasteItem extends Component
{
    public $receiver_id, $teacher_name, $deployed_data, $ff=0, $hover_id;

    public function render()
    {
        $this->displayData();
        return view('livewire.waste-item');
    }

    public function mount($teacher_id){
       $this->receiver_id = $teacher_id;
    }

    public function displayData(){
        $this->teacher_name = Receiver::find($this->receiver_id);
        $this->deployed_data = BackupPrepare::where('receiver','=', $this->teacher_name->fullname)
            ->where('item_type', '!=', 'consumable')
            ->get();
    }

    public function handleMouseOver($id){
        $this->hover_id = $id;
        $this->ff = 1;
    }

    public function mouseOut(){
        $this->ff = 0;
    }
}
