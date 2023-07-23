<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\BackupWaste;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Waste extends Component
{
    public $search_teacher, $item_condition="good", $display_search= "show", $delete_id, $result, $display_table = "hide", $prepare_data;

    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
            $this->result = [];
        }
        return view('livewire.waste');
    }

    public function search(){
        $this->result = DB::table('receivers')
            ->where('fullname','LIKE','%'.$this->search_teacher.'%')
            ->get();
    }

    public function click_suggest($id){
        $data = Receiver::find($id);
        $this->search_teacher = $data->fullname;
        $this->display_search = "hide";
    }

    public function find(){
        $this->display_table = "show";
        $this->prepare_data = DB::table('backup_prepares')
            ->where('receiver','LIKE', '%'.$this->search_teacher.'%')
            ->get();
    }


    public function delete_click($id){
        $this->delete_id = $id;
        $this->find();
    }

    public function deploy(){
        $ju = 0;
        $waste = BackupPrepare::find($this->delete_id);
        try {
            BackupWaste::create([
                'item_name' => $waste->item_name,
                'quantity' => $waste->quantity,
                'unit' => $waste->unit,
                'receiver' => $waste->receiver,
                'serial' => $waste->serial,
                'condition' => $this->item_condition,
            ]);
            session()->flash('good',"good");
            $ju = 1;
        }
        catch (\Exception $e){
            session()->flash('bad',"good");
        }

        if ($ju == 1){
           BackupPrepare::find($this->delete_id)->delete();
        }

        $this->find();
    }

    public function updatedSearchTeacher(){
        $this->display_search = "show";
        $this->display_table = "hide";
    }
}
