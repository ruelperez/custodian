<?php

namespace App\Http\Livewire;

use App\Models\DesigPar;
use Livewire\Component;

class ParDesignation extends Component
{
    public  $pr_btn = "update", $num=0, $desigPar, $printedName, $position;
    public function render()
    {
        $this->desigPar = DesigPar::first();
        if ($this->num == 0 and $this->desigPar === null){
            $this->pr_btn = "submit";
        }
        elseif ($this->num == 0){
            $this->pr();
        }
        return view('livewire.par-designation');
    }

    public function pr(){
        $this->printedName = $this->desigPar->printedName;
        $this->position = $this->desigPar->position;
    }

    public function prSubmit(){
        DesigPar::create([
            'printedName' => $this->printedName,
            'position' => $this->position,
        ]);
        $this->pr_btn = "update";
        $this->num = 1;
    }

    public function prBtn($btnName){
        $this->num = 1;
        $this->pr_btn = $btnName;
        if ($btnName === "edit"){
            $datas = DesigPar::first();
            $this->printedName = $datas->printedName;
            $this->position = $datas->position;

        }
        elseif ($this->pr_btn === "update"){
            $data = DesigPar::first();
            $data->printedName = $this->printedName;
            $data->position = $this->position;
            $data->save();
        }
    }
}
