<?php

namespace App\Http\Livewire;

use App\Models\BackupPrepare;
use App\Models\Par;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyCard extends Component
{
    use WithPagination;

    public $itemName, $position, $item, $par_num, $property_num, $qty, $prop_id, $unit, $component_id, $prop_num, $date, $amount=0, $clickBk=0, $stockcard_data, $teacher_name, $component_data = [];

    public function render()
    {
        $this->stockcard_data = DB::table('property_cards')
            ->where('item_name', '=', $this->itemName)
            ->get();
        foreach ($this->stockcard_data as $st){
            $this->property_num = $st->property_num;
        }

        if ($this->prop_id != null){
            $this->component_data = \App\Models\PropertyCard::find($this->prop_id)->component;
        }
        return view('livewire.property-card');
    }

    public function updated($field){
        $this->validateOnly($field, [
            'qty' => 'numeric',
            'amount' => 'numeric',
        ]);

        if ($field === 'property_num'){
            $data = \App\Models\PropertyCard::where('item_name','=',$this->itemName)->get();
            foreach ($data as $datas){
                $rowData = \App\Models\PropertyCard::find($datas->id);
                $rowData->property_num = $this->property_num;
                $rowData->save();
            }
        }
        if ($field === 'par_num'){
            $data = \App\Models\PropertyCard::find($this->prop_id)->component;
            foreach ($data as $datas){
                $rowData = \App\Models\Component::find($datas->id);
                $rowData->property_number = $this->par_num;
                $rowData->save();
            }
        }
    }
    public function mount($dateData){
        $this->itemName = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }

    public function clickView($name,$time,$id){
        $df = \App\Models\PropertyCard::find($id);
        $this->position = $df->position;
        $this->teacher_name = $name;
        $this->date = $time;
        $this->prop_id = $id;
        $this->par_num = 'TANHS-'.$df->property_num;
        $ds = \App\Models\PropertyCard::find($id)->component;
        $cnt = count($ds) + 1;
        $this->prop_num = $this->par_num.'-'.$cnt;
    }

    public function submit(){
        try {
            \App\Models\Component::create([
                'item_name' => $this->item,
                'quantity' => $this->qty,
                'unit' => $this->unit,
                'receiver' => $this->teacher_name,
                'property_number' => $this->prop_num,
                'date_acquired' => $this->date,
                'amount' => $this->amount,
                'property_card_id' => $this->prop_id,
                'par_num' => $this->par_num,
                'position' => $this->position,
            ]);

            $gh = \App\Models\Component::latest()->first()->get();
            $vf = Par::all();
            $back = BackupPrepare::all();
            foreach ($gh as $comp){
                $n = 0;
                foreach ($vf as $par){
                    if ($comp->id == $par->component_id){

                        $n++;
                    }
                }
                if ($n == 0){
                    Par::create([
                        'item_name' => $this->item,
                        'quantity' => $this->qty,
                        'unit' => $this->unit,
                        'receiver' => $this->teacher_name,
                        'parnum' => $this->par_num,
                        'property_num' => $this->prop_num,
                        'date_acquired' => $this->date,
                        'amount' => $this->amount,
                        'position' => $this->position,
                        'component_id' => $comp->id,
                    ]);
                }
                $n = 0;
            }

            foreach ($gh as $comp){
                $n = 0;
                foreach ($back as $par){
                    if ($comp->id == $par->component_id){

                        $n++;
                    }
                }
                if ($n == 0){
                    BackupPrepare::create([
                        'item_name' => $this->item,
                        'quantity' => $this->qty,
                        'unit'=> $this->unit,
                        'receiver' => $this->teacher_name,
                        'item_type' => "sets",
                        'position'=> $this->position,
                        'transaction_name' => "supply",
                        'prop_num'  => $this->prop_num,
                        'par_num'  => $this->par_num,
                        'is_stolen' => 0,
                        'is_lost' => 0,
                        'component_id' => $comp->id,
                    ]);
                }
                $n = 0;
            }
            $this->item = "";
            $this->qty = "";
            $this->unit = "";
            $this->amount = "";
            $ds = \App\Models\PropertyCard::find($this->prop_id)->component;
            $cnt = count($ds) + 1;
            $this->prop_num = $this->par_num.'-'.$cnt;

            session()->flash('dataAdded',"Successfully added");
        }
        catch (\Exception $e){
            session()->flash('dataFailed',"Failed to add");
        }

    }

    public function edit($id){
        $this->component_id = $id;
        $data = \App\Models\Component::find($id);
        $this->item = $data->item_name;
        $this->qty = $data->quantity;
        $this->unit = $data->unit;
        $this->prop_num = $data->property_number;
        $this->date = $data->date_acquired;
        $this->amount = $data->amount;
        $this->prop_id = $data->property_card_id;
        $this->teacher_name = $data->receiver;
    }

    public function submitEdit(){
        $data = \App\Models\Component::find($this->component_id);
        $ds = BackupPrepare::where('component_id','=',$this->component_id)->get();
        foreach ($ds as $sd){
            $idss = $sd->id;
        }
        $re = BackupPrepare::find($idss);
        $re->item_name = $this->item;
        $re->quantity= $this->qty;
        $re->unit = $this->unit;
        $re->prop_num = $this->prop_num;
        $re->receiver = $this->teacher_name;
        $re->save();

        try {
            $data->item_name = $this->item;
            $data->quantity = $this->qty;
            $data->unit = $this->unit;
            $data->property_number = $this->prop_num;
            $data->date_acquired = $this->date;
            $data->amount = $this->amount;
            $data->receiver = $this->teacher_name;
            $data->property_card_id = $this->prop_id;
            $data->save();
            $this->item = "";
            $this->qty = "";
            $this->unit = "";
            $this->amount = "";
            $this->prop_num = "";
            $this->date = "";
            $this->teacher_name = "";
            $this->prop_id = "";
            session()->flash('successEdit',"Successfully updated");
        }
        catch (\Exception $e){
            session()->flash('failedEdit',"Failed to update");
        }

    }

    protected $listeners = [
        'propDel' => 'propDelete'
    ];

    public function propDelete($id){
        $ds = BackupPrepare::where('component_id','=',$id)->get();
        foreach ($ds as $sd){
           BackupPrepare::find($sd->id)->delete();
        }
        try {
            \App\Models\Component::find($id)->delete();
            $ds = \App\Models\PropertyCard::find($this->prop_id)->component;
            $cnt = count($ds) + 1;
            $this->prop_num = $this->par_num.'-'.$cnt;

            $ds = Par::where('component_id',$id)->get();
            foreach ($ds as $er){
                Par::find($er->id)->delete();
            }
            session()->flash('successDel', "Successfully deleted");
        }
        catch (\Exception $e){
            session()->flash('failedDel', "Failed to delete");
        }

    }
}
