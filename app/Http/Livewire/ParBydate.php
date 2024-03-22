<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Par;
use Livewire\Component;

class ParBydate extends Component
{
    public $search, $request_data = [], $clickView = 0, $dateData, $selectTransaction="ics", $itts;

    public function render()
    {
        if ($this->selectTransaction == "ics"){
            if ($this->search != ""){
                $this->request_data = BackupPrepare::select('serial','item_name')
                    ->orWhere('serial','like', '%'.$this->search.'%')
                    ->orWhere('item_name','like', '%'.$this->search.'%')
                    ->where('transaction_name','=',"property_ics")
                    ->distinct()
                    ->get();
            }
            else{
                $this->request_data = BackupPrepare::select('serial','item_name')
                    ->where('transaction_name','=',"property_ics")
                    ->distinct()
                    ->get();
            }
        }
        else{
            if ($this->search != ""){
                $this->request_data = BackupPrepare::select('serial','item_name')
                    ->orWhere('serial','like', '%'.$this->search.'%')
                    ->orWhere('item_name','like', '%'.$this->search.'%')
                    ->where('transaction_name','=',"par")
                    ->distinct()
                    ->get();
            }
            else{
                $this->request_data = BackupPrepare::select('serial','item_name')
                    ->where('transaction_name','=',"par")
                    ->distinct()
                    ->get();
            }
        }


        return view('livewire.par-bydate');
    }

    public function click($name,$ind){
        $this->itts = $ind;
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
