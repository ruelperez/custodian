<?php

namespace App\Http\Livewire;

use App\Models\Par;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ParReport extends Component
{
    public $search="", $request_data, $clickBk = 0, $par_num, $dataDate;

    public function render()
    {
        $this->request_data = Par::
            where('ics','=', $this->dataDate)
            ->get();
        foreach ($this->request_data as $dt){
            $this->par_num = $dt->parnum;
        }
        return view('livewire.par-report');
    }

    public function mount($dateData){
        $this->dataDate = $dateData;
    }

    public function updated($field){
        if ($field === 'par_num'){
            foreach ($this->request_data as $data){
                $data->parnum =  $this->par_num;
                $data->save();
            }
        }
    }

    public function clickBack(){
        $this->clickBk = 1;
    }
}
