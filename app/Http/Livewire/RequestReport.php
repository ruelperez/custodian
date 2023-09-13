<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestReport extends Component
{
    public $search="", $request_data, $clickBk = 0, $dataDate;

    public function render()
    {
        if ($this->search != ""){
            $this->feed();
        }
        else{
            $this->request_data = DB::table('backup_requests')
                ->where('created_at','like', '%'.$this->dataDate.'%')
                ->get();
        }
        return view('livewire.request-report');
    }

    public function mount($dateData){
       $this->dataDate = $dateData;
    }

    public function feed(){
        $this->request_data = DB::table('backup_requests')
            ->where('item_name','like', '%'.$this->search.'%')
            ->orWhere('created_at','like','%'.$this->search.'%')
            ->take(10)
            ->get();
    }

    public function clickBack(){
        $this->clickBk = 1;
    }
}
