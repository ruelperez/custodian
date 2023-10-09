<?php

namespace App\Http\Livewire;

use App\Models\BackupRequest;
use App\Models\Request;
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

    protected $listeners = [
        'movebToPr' => 'clickMove'
    ];

    public function clickMove(){
        try {
            for($i=0; $i < count($this->request_data); $i++){
                Request::create([
                    'item_name' => $this->request_data[$i]['item_name'],
                    'quantity' => $this->request_data[$i]['quantity'],
                    'unit' => $this->request_data[$i]['unit'],
                    'unit_cost' => $this->request_data[$i]['unit_cost'],
                    'item_type' => $this->request_data[$i]['item_type'],
                    'total_cost' => $this->request_data[$i]['total_cost'],
                    'created_at' => $this->request_data[$i]['created_at'],
                ]);
            }

            for ($z=0; $z < count($this->request_data); $z++){
                BackupRequest::find($this->request_data[$z]['id'])->delete();
            }
            session()->flash('moveSuccess','Successfully moved to purchase request');
        }
        catch (\Exception $e){
            session()->flash('moveFailed','Failed to moved to purchase request');
        }
    }

}
