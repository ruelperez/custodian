<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\BackupWaste;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Waste extends Component
{
    public $search_teacher, $receiver_id, $tg = 0, $item_condition="good", $display_search= "show", $rf=0, $delete_id, $result, $display_table = "hide", $prepare_data;

    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
            $this->result = BackupPrepare::select('receiver')
                ->where('item_type','!=','consumable')
                ->distinct()
                ->get();
        }
        return view('livewire.waste');
    }

    public function search(){
        $this->result = DB::table('receivers')
            ->where('fullname','LIKE','%'.$this->search_teacher.'%')
            ->get();
    }

    public function clickView($id){
        $this->receiver_id = $id;
        $this->tg = 1;
    }

    public function backButton(){
        $this->tg = 0;
    }

    protected $listeners = [
        'clickBack45' => 'clickWaste'
    ];

    public function clickWaste(){
        $this->tg = 0;
    }
}
