<?php

namespace App\Http\Controllers;

use App\Models\DesigPar;
use App\Models\Par;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ParController extends Controller
{
    public function pdf($date){
        $desig = DesigPar::first();
        $request_data = Par::where('ics','=', $date)->get();
        foreach ($request_data as $pr){
            $receivedBy = $pr->receiver;
            $position = $pr->position;
            $par_num = $pr->parnum;
            $dates = $pr->date_acquired;
        }
        $pdf = PDF::loadView('form.prop_components', compact('request_data','dates','par_num','desig','position','receivedBy'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
