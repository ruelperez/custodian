<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use App\Models\PropertyCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function pdf($prop_id){
        $data = PropertyCard::find($prop_id);

        $pdf = PDF::loadView('form.property', compact('data'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
