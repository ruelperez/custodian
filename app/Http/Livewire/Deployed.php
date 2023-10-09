<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Deployed extends Component
{
    public $request_data, $clickBk = 0, $dataDate, $teacherName;
    public function render()
    {
        $this->request_data = DB::table('backup_prepares')
            ->where('created_at','like', '%'.$this->dataDate.'%')
            ->where('receiver', '=', $this->teacherName)
            ->where('item_type','!=', 'consumable')
            ->get();
        return view('livewire.deployed');
    }

    public function mount($teacher_name,$date_data){
        $this->teacherName = $teacher_name;
        $this->dataDate = $date_data;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }
}
