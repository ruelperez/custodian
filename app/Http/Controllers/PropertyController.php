<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use App\Models\PropertyCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function pdf($itemName){
        $request_data = PropertyCard::all();
        $pdf = PDF::loadView('form.property', compact('request_data','itemName'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
