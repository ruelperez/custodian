<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\BackupWaste;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Waste extends Component
{
    public $search_teacher, $item_condition="good", $display_search= "show", $rf=0, $delete_id, $result, $display_table = "hide", $prepare_data;

    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
            $this->allTeachers();
        }
        return view('livewire.waste');
    }

    public function search(){
        $this->result = DB::table('receivers')
            ->where('fullname','LIKE','%'.$this->search_teacher.'%')
            ->get();
    }

    public function allTeachers(){
        $this->result = Receiver::all();
    }
}
