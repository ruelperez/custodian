<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Portion extends Component
{
    public $option = "graph", $report=0;

    public function render()
    {
        return view('livewire.portion');
    }

    public function clickPortion($porName){
        $this->option = $porName;
        if ($this->option != "report"){
            $this->report = 0;
        }
    }

    public function clickReport($reportName){
        $this->report = $reportName;
    }

    public function clickBack(){
        $this->report = 0;
    }
}
