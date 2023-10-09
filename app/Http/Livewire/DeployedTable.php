<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use Livewire\Component;

class DeployedTable extends Component
{
    public $teacherName, $deployed_data;

    public function render()
    {
        $this->deployed_data = BackupPrepare::where('receiver', '=', $this->teacherName)
            ->get();

        return view('livewire.deployed-table');
    }

    public function mount($teacher_name){
        $this->teacherName = $teacher_name;
    }
}
