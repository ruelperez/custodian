<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use Livewire\Component;

class TeacherByname extends Component
{
    public $search_teacher, $rt = 0, $result, $tg = 0, $teacher_name;

    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
            $this->result = BackupPrepare::select('receiver')
                ->where('transaction_name', '=', 'property_ics')
//                ->where('total_cost','<', 50000)
                ->distinct()
                ->get();
        }

        return view('livewire.teacher-byname');
    }

    public function search(){
        $this->result = BackupPrepare::select('receiver')
            ->where('receiver', 'LIKE', '%'.$this->search_teacher.'%')
            ->where('transaction_name', '=', 'property_ics')
//            ->where('item_type', '!=', 'consumable')
//            ->where('total_cost','<', 50000)
            ->distinct()
            ->get();
    }

    public function clickView($name){
        $this->teacher_name = $name;
        $this->tg = 1;
        $this->rt = 1;
    }

    protected $listeners = [
        'clickBk23' => 'clickBack1',
        'clickBack25' => 'clickBack25',

    ];

    public function clickBack25(){
        $this->rt = 1;
        $this->tg = 1;
    }

    public function clickBack(){
        $this->rt = 0;
        $this->tg = 0;
    }
    public function clickBack1(){
        $this->rt = 0;
    }
}
