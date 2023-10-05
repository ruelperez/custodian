<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PmrBydate extends Component
{
    public $search, $request_data, $clickView = 0, $dateData;

    public function render()
    {
        if ($this->search != ""){
            $this->search();
        }
        else{
            $this->request_data = BackupPrepare::select('ics')
                ->distinct()
                ->orderBy('ics','desc')
                ->get();
        }

        return view('livewire.pmr-bydate');
    }

    public function search(){
        $this->request_data = BackupPrepare::select('ics')
            ->distinct()
            ->where('ics','like', '%'.$this->search.'%')
            ->orderBy('ics','desc')
            ->get();
    }

    public function click($name){
        $this->dateData = $name;
        $this->clickView = 1;
    }

    protected $listeners = [
        'clickBack6' => 'back',
    ];

    public function back(){
        $this->clickView = 0;
    }
}
