<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    public function pdf($prop_id){
        $request_data = \App\Models\PropertyCard::find($prop_id)->component;
        foreach ($request_data as $data){
            $par_num = $data->property_number;
        }
        $pdf = PDF::loadView('form.component', compact('request_data','par_num'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
