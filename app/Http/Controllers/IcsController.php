<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IcsController extends Controller
{
    public function pdf($icsNum){
        $ics_data = DB::table('distributes')
            ->where('ics','=', $icsNum)
            ->where('item_type', '!=', 'consumable')
            ->get();
        $pdf = PDF::loadView('form.ics', compact('ics_data','icsNum'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');

    }
}
