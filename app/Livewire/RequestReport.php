<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestReport extends Component
{
    public $search="", $request_data;

    public function render()
    {
        if ($this->search != ""){
            $this->feed();
        }
        else{
            $this->request_data = DB::table('backup_requests')->orderBy('item_name','asc')->take(10)->get();
        }
        return view('livewire.request-report');
    }

    public function feed(){
        $this->request_data = DB::table('backup_requests')
            ->where('item_name','like', '%'.$this->search.'%')
            ->orWhere('created_at','like','%'.$this->search.'%')
            ->take(10)
            ->get();
    }
}
