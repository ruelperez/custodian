<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewButton extends Component
{
    public $date_data, $deployed_data, $date_save;
    public function render()
    {
        return view('livewire.view-button');
    }

    public function mount($date){
        $this->date_data = $date;
    }
    protected $listeners = [
        'seen' => 'view'
    ];

    public function view($data){
        $this->date_save = $data;
        $this->deployed_data =DB::table('backup_prepares')
            ->where('created_at', '=', $data)
            ->where('item_type', '!=', 'consumable')
            ->get();
    }
}
