<?php

namespace App\Http\Livewire;

use App\Models\DesigIc;
use App\Models\DesigPar;
use App\Models\DesigPo;
use App\Models\DesigPr;
use App\Models\DesigWmr;
use Livewire\Component;

class PrDesignation extends Component
{
    public  $pr_btn = "update", $num=0, $requestName, $requestDesignation, $approvedName, $approvedDesignation, $desigPr, $desigPo, $desigIcs, $desigWmr, $desigPar, $principal, $designation3;
    public function render()
    {
        $this->desigPr = DesigPr::first();
        if ($this->num == 0 and $this->desigPr === null){
            $this->pr_btn = "submit";
        }
        elseif ($this->num == 0){
            $this->pr();
        }

        return view('livewire.pr-designation');
    }

    public function pr(){
        $this->requestName = $this->desigPr->requestPrintedName;
        $this->requestDesignation = $this->desigPr->requestDesignation;
        $this->approvedName = $this->desigPr->approvedPrintedName;
        $this->approvedDesignation = $this->desigPr = $this->desigPr->approvedDesignation;
    }

    public function prSubmit(){
        DesigPr::create([
            'requestPrintedName' => $this->requestName,
            'requestDesignation' => $this->requestDesignation,
            'approvedPrintedName' => $this->approvedName,
            'approvedDesignation' => $this->approvedDesignation,
        ]);
        $this->pr_btn = "update";
        $this->num = 1;
    }

    public function prBtn($btnName){
        $this->num = 1;
        $this->pr_btn = $btnName;
        if ($btnName === "edit"){
            $datas = DesigPr::first();
            $this->requestName = $datas->requestPrintedName;
            $this->requestDesignation = $datas->requestDesignation;
            $this->approvedName = $datas->approvedPrintedName;
            $this->approvedDesignation = $datas->approvedDesignation;
        }
        elseif ($this->pr_btn === "update"){
            $data = DesigPr::first();
            $data->requestPrintedName = $this->requestName;
            $data->requestDesignation = $this->requestDesignation;
            $data->approvedPrintedName = $this->approvedName;
            $data->approvedDesignation = $this->approvedDesignation;
            $data->save();
        }
    }

}
