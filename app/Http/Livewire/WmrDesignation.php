<?php

namespace App\Http\Livewire;

use App\Models\DesigWmr;
use Livewire\Component;

class WmrDesignation extends Component
{
    public  $pr_btn = "update", $num=0, $desigWmr, $nameOfSupply;
    public function render()
    {
        $this->desigWmr = DesigWmr::first();
        if ($this->num == 0 and $this->desigWmr === null){
            $this->pr_btn = "submit";
        }
        elseif ($this->num == 0){
            $this->pr();
        }
        return view('livewire.wmr-designation');
    }

    public function pr(){
        $this->nameOfSupply = $this->desigWmr->nameOfSupply;
    }

    public function prSubmit(){
        DesigWmr::create([
            'nameOfSupply' => $this->nameOfSupply,
        ]);
        $this->pr_btn = "update";
        $this->num = 1;
    }

    public function prBtn($btnName){
        $this->num = 1;
        $this->pr_btn = $btnName;
        if ($btnName === "edit"){
            $datas = DesigWmr::first();
            $this->nameOfSupply = $datas->nameOfSupply;
        }
        elseif ($this->pr_btn === "update"){
            $data = DesigWmr::first();
            $data->nameOfSupply = $this->nameOfSupply;
            $data->save();
        }
    }
}
