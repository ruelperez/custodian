<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyCard extends Component
{
    use WithPagination;

    public $itemName, $item, $par_num, $property_num, $qty, $prop_id, $unit, $component_id, $prop_num, $date, $amount=0, $clickBk=0, $stockcard_data, $teacher_name, $component_data = [];

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
            foreach ($this->component_data as $ga){
                $this->par_num = $ga->property_number;
            }
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
        $this->teacher_name = $name;
        $this->date = $time;
        $this->prop_id = $id;
        $this->par_num = 'TANHS-'.$df->property_num;
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
            ]);
            $this->item = "";
            $this->qty = "";
            $this->unit = "";
            $this->prop_num = "";
            $this->amount = "";
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
        try {
            \App\Models\Component::find($id)->delete();
            session()->flash('successDel', "Successfully deleted");
        }
        catch (\Exception $e){
            session()->flash('failedDel', "Failed to delete");
        }

    }
}
