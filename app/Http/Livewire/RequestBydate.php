<?php

namespace App\Http\Livewire;

use App\Models\BackupRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestBydate extends Component
{
    public $search, $request_data, $clickView = 0, $dateData;

    public function render()
    {
        if ($this->search != ""){
            $this->search();
        }
        else{
            $this->request_data = BackupRequest::select(DB::raw('DATE(created_at) as date'))
                ->groupBy('date')
                ->orderBy('created_at','desc')
                ->get();
        }

        return view('livewire.request-bydate');
    }

    public function search(){
        $this->request_data = BackupRequest::select(DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->where('created_at','like', '%'.$this->search.'%')
            ->get();
    }

    public function click($name){
        $this->dateData = $name;
        $this->clickView = 1;
    }

    protected $listeners = [
        'clickBack2' => 'back',
        'prNumClickBack' => 'back',
    ];

    public function back(){
        $this->clickView = 0;
    }
}
