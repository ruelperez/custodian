<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    public function pdf($prop_id){
        $request_data = \App\Models\PropertyCard::find($prop_id)->component;
        $pdf = PDF::loadView('form.component', compact('request_data'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
