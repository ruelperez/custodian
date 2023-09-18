<?php

namespace App\Http\Livewire;

use App\Models\BackupWaste;
use Livewire\Component;

class PwmrByname extends Component
{
    public $search_teacher, $result, $tg = 0, $teacher_name;

    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
            $this->result = BackupWaste::select('receiver')
                ->distinct()
                ->get();
        }
        return view('livewire.pwmr-byname');
    }

    public function search(){
        $this->result = BackupWaste::select('receiver')
            ->where('receiver', 'LIKE', '%'.$this->search_teacher.'%')
            ->distinct()
            ->get();
    }

    public function clickView($name){
        $this->teacher_name = $name;
        $this->tg = 1;
    }

    public function clickBack(){
        $this->tg = 0;
    }
}
