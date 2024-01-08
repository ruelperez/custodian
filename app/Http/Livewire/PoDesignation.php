<?php

namespace App\Http\Livewire;

use App\Models\DesigPo;
use Livewire\Component;

class PoDesignation extends Component
{
    public  $pr_btn = "update", $num=0, $desigPo, $principal;
    public function render()
    {
        $this->desigPo = DesigPo::first();
        if ($this->num == 0 and $this->desigPo === null){
            $this->pr_btn = "submit";
        }
        elseif ($this->num == 0){
            $this->pr();
        }
        return view('livewire.po-designation');
    }

    public function pr(){
        $this->principal = $this->desigPo->principal;
    }

    public function prSubmit(){
        DesigPo::create([
            'principal' => $this->principal,
        ]);
        $this->pr_btn = "update";
        $this->num = 1;
    }

    public function prBtn($btnName){
        $this->num = 1;
        $this->pr_btn = $btnName;
        if ($btnName === "edit"){
            $datas = DesigPo::first();
            $this->principal = $datas->principal;
        }
        elseif ($this->pr_btn === "update"){
            $data = DesigPo::first();
            $data->principal = $this->principal;
            $data->save();
        }
    }
}
