<?php

namespace App\Http\Livewire;

use App\Models\BackupWaste;
use Livewire\Component;

class PwmrByname extends Component
{
    public $search_teacher, $rt = 0, $ss=0, $result, $tg = 0, $teacher_name;

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

    public function mount($waste){

    }

    public function clickSummary(){
        $this->ss = 1;
        $this->tg = 3;
        $this->rt = 1;
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
        $this->rt = 1;
    }

    protected $listeners = [
        'clickBk23' => 'clickBack1',
        'clickBack25' => 'clickBack25',
        'clickBack8' => 'clickb',

    ];

    public function clickb(){
        $this->ss = 0;
    }

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
