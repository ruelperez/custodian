<?php

namespace App\Http\Livewire;

use App\Models\BackupRequest;
use Livewire\Component;

class RequestBypr extends Component
{
    public $pr, $dates, $clickView = 0, $prNum;
    public function render()
    {
        $this->pr = BackupRequest::select('pr_num')
            ->where('created_at','like','%'.$this->dates.'%')
            ->distinct()
            ->get();
        return view('livewire.request-bypr');
    }

    public function mount($dateData){
        $this->dates = $dateData;
    }

    public function click($num){
        $this->prNum = $num;
        $this->clickView = 1;
    }
}
