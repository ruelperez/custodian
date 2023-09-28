<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\BackupWaste;
use App\Models\MovedItem;
use App\Models\Receiver;
use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PHPUnit\Exception;

class WasteItem extends Component
{
    public $receiver_id, $qtyPass = 0, $gk = 0, $qtyNotModel, $waste_id, $unit, $movedData, $qty = 0, $item_name, $teacher_name, $receiver_name, $deployed_data, $ff=0, $hover_id;

    public function render()
    {
        if ($this->qty != ""){
            $this->qtyValidator();
        }
        if ($this->gk == 0){
            $this->displayData();
            $this->displayMoved();
        }
        else{
            $this->deployed_data = [];
        }
        return view('livewire.waste-item');
    }

    public function qtyValidator(){
        if (!is_numeric($this->qty)){
            session()->flash('notNumber',"Input numbers only");
            $this->qtyPass = 0;
        }
        elseif ($this->qtyNotModel >= $this->qty){
            $this->qtyPass = 1;
        }
        else{
            session()->flash('failed', $this->qtyNotModel." quantity available");
            $this->qtyPass = 0;
        }
    }

    public function mount($teacher_id){
       $this->receiver_id = $teacher_id;
    }

    public function displayData(){
        $this->teacher_name = Receiver::find($this->receiver_id);
        $this->receiver_name = $this->teacher_name->fullname;
        $this->deployed_data = BackupPrepare::where('receiver','=', $this->teacher_name->fullname)
            ->where('item_type', '!=', 'consumable')
            ->get();
    }

    public function displayMoved(){
        $this->movedData = MovedItem::where('receiver', $this->receiver_name)->get();
    }
    public function clickMove(){
        $data = BackupPrepare::find($this->waste_id);
        try {
            MovedItem::create([
                'item_name' => $data->item_name,
                'quantity' => $this->qty,
                'unit' => $data->unit,
                'receiver' => $data->receiver,
                'item_type' => $data->item_type,
                'serial' => $data->serial,
                'created_at' => $data->created_at,
                'backup_prepare_id' => $this->waste_id,
            ]);
            $this->qty = 0;
            session()->flash('successMove', "Successfully Moved");
        }
        catch (\Exception $e){
            session()->flash('failedMove',"Failed to Move");
        }

    }

    public function clickMoveBack($id){
        $data = MovedItem::find($id);
        BackupPrepare::create([
            'item_name' => $data->item_name,
            'quantity' => $data->quantity,
            'unit' => $data->unit,
            'receiver' => $data->receiver,
            'item_type' => $data->item_type,
            'serial' => $data->serial,
            'created_at' => $data->created_at,
        ]);
        MovedItem::find($id)->delete();
    }

    public function clickArrow($id){
        $data = BackupPrepare::find($id);
        $this->item_name = $data->item_name;
        $this->waste_id = $id;
        $this->qtyNotModel = $data->quantity;
    }

    public function submitMove(){
        if ($this->qtyPass == 1){
            $data = BackupPrepare::find($this->waste_id);
            $newQty = $data->quantity - $this->qty;
            $data->quantity = $newQty;
            $data->save();
            $this->clickMove();
        }
        else{
            return;
        }
    }

    protected $listeners = [
        'remove' => 'removeItemMoved',
        'moves' => 'moveToInventory',
        'transfer' => 'moveToBackupWaste'
    ];

    public function moveToBackupWaste(){
        $g = 0;
        $datas = MovedItem::all();
        try {
            foreach ($datas as $data){
                BackupWaste::create([
                    'item_name' => $data->item_name,
                    'quantity' => $data->quantity,
                    'unit' => $data->unit,
                    'receiver' => $data->receiver,
                    'serial' => $data->serial,
                ]);
            }
            $g = 1;
        }
        catch (\Exception $e){
            $g = 0;
        }

        if ($g == 1){
            foreach ($datas as $data){
                $data->delete();
            }
        }

    }

    public function moveToInventory(){
        $this->gk = 1;
        foreach ($this->deployed_data as $data){
            try {
                $tt = \App\Models\Inventory::where('item_name',$data->item_name)->increment('quantity',$data->quantity);
                if ($tt == 0){
                    \App\Models\Inventory::create([
                        'item_name' => $data->item_name,
                        'quantity' => $data->quantity,
                        'unit' => $data->unit,
                        'item_type' => $data->item_type,
                        'inventory_number' => 0,
                    ]);
                }
                BackupWaste::create([
                    'item_name' => $data->item_name,
                    'quantity' => $data->quantity,
                    'unit' => $data->unit,
                    'receiver' => $data->receiver,
                    'serial' => $data->serial,
                ]);

                session()->flash('transfer',"Successfully  Moved to Inventory");
            }
            catch (\Exception $e){
                session()->flash('failed',"Failed to Move");
            }
        }

        foreach ($this->deployed_data as $ord){
            BackupPrepare::find($ord->id)->delete();
        }

        Receiver::find($this->receiver_id)->delete();
    }

    public function removeItemMoved($id){
        $moveData = MovedItem::find($id);
        $backupData = BackupPrepare::find($moveData->backup_prepare_id);
//        qty addition
        $newQty = $backupData->quantity + $moveData->quantity;
        $backupData->quantity = $newQty;
        $backupData->save();
//        delete move item data
        MovedItem::find($id)->delete();
    }

    public function clickPrint(){
        $rt = 0;
        $move = MovedItem::all();
        try {
            foreach ($move as $moves){
                Request::create([
                    'item_name' => $moves->item_name,
                    'quantity' => $moves->quantity,
                    'unit' => $moves->unit,
                    'item_type' => $moves->item_type,
                ]);
            }
            $rt = 1;
        }
        catch (\Exception $e){
            $rt = 0;
        }

        if ($rt == 1){
            foreach ($move as $delMove){
                $delMove->delete();
            }
        }

    }
}
