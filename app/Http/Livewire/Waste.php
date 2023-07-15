<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\BackupWaste;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Waste extends Component
{
    public $search_teacher,$rt=0, $item_condition="good", $delete_id, $result, $base=0, $prepare_data, $click=0;

    public function render()
    {
        if ($this->search_teacher != ""){
            $this->search();
        }
        else{
           $this->base = 0;
            $this->search();
        }
        return view('livewire.waste');
    }

    public function search(){
        $this->result = DB::table('receivers')
            ->where('fullname','LIKE','%'.$this->search_teacher.'%')
            ->get();
        if ($this->rt == 1){
            $this->find();
        }
        if ($this->search_teacher == ""){
            $this->click = 0;
        }
    }

    public function click_suggest($id){
        $this->click = 1;
        $data = Receiver::find($id);
        $this->search_teacher = $data->fullname;
    }

    public function find(){
        $this->prepare_data = DB::table('backup_prepares')
            ->where('receiver','LIKE', '%'.$this->search_teacher.'%')
            ->get();
        if (count($this->prepare_data) > 0){
            $this->base = 1;
        }
    }

    public function search_click(){
        $this->base = 0;
        $this->click = 0;
    }

    public function delete_click($id){
        $this->delete_id = $id;
        $this->rt = 1;
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

    }
}
