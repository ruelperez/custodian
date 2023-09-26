<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyCard extends Component
{
    use WithPagination;

    public $itemName, $item, $qty, $prop_id, $unit, $prop_num, $date, $amount=0, $clickBk=0, $stockcard_data, $teacher_name, $component_data = [];

    public function render()
    {
        $this->stockcard_data = DB::table('property_cards')
            ->where('item_name', '=', $this->itemName)
            ->get();
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
    }
    public function mount($dateData){
        $this->itemName = $dateData;
    }

    public function clickBack(){
        $this->clickBk = 1;
    }

    public function clickView($name,$time,$id){
        $this->teacher_name = $name;
        $this->date = $time;
        $this->prop_id = $id;
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

}
