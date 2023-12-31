<?php

namespace App\Http\Livewire;

use App\Models\BackupWaste;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PwmrBydate extends Component
{
    public $teacherName, $search, $fg = 0, $request_data, $clickView = 0, $dateData;

    public function render()
    {
        if ($this->search != ""){
            $this->search();
        }
        else{
            $this->request_data = BackupWaste::select(DB::raw('DATE(created_at) as date'))
                ->where('receiver', '=', $this->teacherName)
                ->distinct()
                ->get();
        }

        return view('livewire.pwmr-bydate');
    }

    public  function mount($teacher_name){
        $this->teacherName = $teacher_name;
    }

    public function search(){
        $this->request_data = BackupWaste::select(DB::raw('DATE(created_at) as date'))
            ->where('created_at','like', '%'.$this->search.'%')
            ->where('receiver', '=', $this->teacherName)
            ->distinct()
            ->get();
    }

    public function click($name){
        $this->dateData = $name;
        $this->clickView = 1;
        $this->fg = 1;
    }

    public function clickBack(){
        $this->fg = 0;
        $this->clickView = 0;
    }

//    protected $listeners = [
//        'clickBack6' => 'back',
//    ];

    public function back(){
        $this->clickView = 0;
    }
}
