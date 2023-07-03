<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;

class PurchaseRequest extends Component
{
    public $item_name, $quantity, $request_data;

    public function render()
    {
        $this->request_data = Request::where('isRemove','0')->get();
        return view('livewire.purchase-request');
    }

    public function submit(){
        $data = $this->validate([
            'item_name' => 'required',
            'quantity' => 'integer',
        ]);

        try {
            Request::create($data);
            $this->item_name = "";
            $this->quantity = "";
            session()->flash('dataAdded',"Successfully Added");
        }
        catch (\Exception $e){
            session()->flash('dataError',"Failed to Add");
        }
    }
}
