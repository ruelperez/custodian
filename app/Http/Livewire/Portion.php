<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Portion extends Component
{
    public $option = "graph", $report=0, $df=0;

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

    protected $listeners = [
        'clickBack1' => 'back1',
        'clickBack2' => 'back2',
        'clickBack3' => 'back3',
    ];

    public function back1(){
        $this->df = 1;
    }

    public function back2(){
        $this->df = 0;
    }

    public function back3(){
        $this->df = 0;
    }

}
