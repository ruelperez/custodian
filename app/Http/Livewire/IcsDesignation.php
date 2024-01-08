<?php

namespace App\Http\Livewire;

use App\Models\DesigIc;
use Livewire\Component;

class IcsDesignation extends Component
{
    public  $pr_btn = "update", $num=0, $desigIcs, $printedName, $position;
    public function render()
    {
        $this->desigIcs = DesigIc::first();
        if ($this->num == 0 and $this->desigIcs === null){
            $this->pr_btn = "submit";
        }
        elseif ($this->num == 0){
            $this->pr();
        }
        return view('livewire.ics-designation');
    }

    public function pr(){
        $this->printedName = $this->desigIcs->printedName;
        $this->position = $this->desigIcs->position;
    }

    public function prSubmit(){
        DesigIc::create([
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
            $datas = DesigIc::first();
            $this->printedName = $datas->printedName;
            $this->position = $datas->position;

        }
        elseif ($this->pr_btn === "update"){
            $data = DesigIc::first();
            $data->printedName = $this->printedName;
            $data->position = $this->position;
            $data->save();
        }
    }
}
