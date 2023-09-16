<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use Livewire\Component;

class Deployed extends Component
{
    public $search_teacher, $result, $tg = 0, $teacher_name;
    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
            $this->result = BackupPrepare::select('receiver')
                ->distinct()
                ->get();
        }
        return view('livewire.deployed');
    }

    public function search(){
        $this->result = BackupPrepare::select('receiver')
            ->where('receiver', 'LIKE', '%'.$this->search_teacher.'%')
            ->distinct()
            ->get();
        dd($this->result);
    }

    public function clickView($name){
        $this->teacher_name = $name;
        $this->tg = 1;
    }
}
