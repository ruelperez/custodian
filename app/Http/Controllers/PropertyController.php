<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use App\Models\PropertyCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function pdf($itemName){
        $request_data = PropertyCard::where('item_name', '=', $itemName)->get();
        foreach ($request_data as $st){
            $property_num = $st->property_num;
        }
        $request_data = PropertyCard::all();
        $pdf = PDF::loadView('form.property', compact('request_data','itemName','property_num'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
