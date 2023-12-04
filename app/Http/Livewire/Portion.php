<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Portion extends Component
{
    public $option = "purchase",$mons, $item_type, $mos, $report=0, $df=0, $hover;

    public function render()
    {
        return view('livewire.portion');
    }

    public function clickPortion($porName){
        $this->df = 0;
        $this->option = $porName;
        if ($this->option != "report"){
            $this->report = 0;
        }
        else{
            $this->report = 0;
        }
    }

    public function clickReport($reportName){
        $this->report = $reportName;
    }

    public function clickBack(){
        $this->report = 0;
    }

    public function mount($month,$mon,$item_type){
        $this->mos = $month;
        $this->mons = $mon;
        $this->item_type = $item_type;
    }

    protected $listeners = [
        'clickBack1' => 'back1',
        'clickBack2' => 'back2',
        'clickBack3' => 'back3',
        'clickBack4' => 'back4',
        'clickBack5' => 'back5',
        'clickBack6' => 'back6',
        'clickBack7' => 'back7',
        'clickBack8' => 'back8',
        'clickBack25' => 'back25',
        'prNumClickBack' => 'bk'
    ];

    public function bk(){
        $this->df = 0;
    }
    public function back25(){
        $this->df = 1;
    }

    public function back1(){
        $this->df = 1;
    }

    public function back2(){
        $this->df = 0;
    }

    public function back3(){
        $this->df = 0;
    }

    public function back4(){
        $this->df = 0;
    }

    public function back5(){
        $this->df = 0;
    }

    public function back6(){
        $this->df = 0;
    }

    public function back7(){
        $this->df = 1;
    }

    public function back8(){
        $this->df = 0;
    }

    public function loadingState(){

    }

    public function hoverIn($in){
        $this->hover = $in;
    }

    public function hoverOut($out){
        $this->hover = $out;
    }

}
