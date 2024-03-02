<?php

namespace App\Http\Controllers;

use App\Http\Livewire\PropertyCard;
use App\Models\DesigPar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    public function pdf($prop_id){
        $desig = DesigPar::first();
        $request_data = \App\Models\PropertyCard::find($prop_id)->component;
        $prop_data = \App\Models\PropertyCard::find($prop_id);

        $pdf = PDF::loadView('form.component', compact('request_data','prop_data','desig',))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
