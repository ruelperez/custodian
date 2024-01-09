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
            $par_num = $pr->parnum;
        }
        $pdf = PDF::loadView('form.component', compact('request_data','par_num','desig'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
