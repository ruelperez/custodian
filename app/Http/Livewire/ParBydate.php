<?php

namespace App\Http\Livewire;

use App\Models\Par;
use Livewire\Component;

class ParBydate extends Component
{
    public $search, $request_data, $clickView = 0, $dateData;

    public function render()
    {
        if ($this->search != ""){
            $this->search();
        }
        else{
            $this->request_data = Par::select('ics')
                ->distinct()
                ->orderBy('ics','desc')
                ->get();
        }

        return view('livewire.par-bydate');
    }

    public function search(){
        $this->request_data = Par::select('ics')
            ->distinct()
            ->where('ics','like', '%'.$this->search.'%')
            ->orderBy('ics','desc')
            ->get();
    }

    public function click($name){
        $this->dateData = $name;
        $this->clickView = 1;
    }

    protected $listeners = [
        'clickBack6' => 'back',
    ];

    public function back(){
        $this->clickView = 0;
    }
}
