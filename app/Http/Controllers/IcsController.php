<?php

namespace App\Http\Controllers;

use App\Models\DesigIc;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IcsController extends Controller
{
    public function pdf($icsNum){
        $receivedBy;
        $desig = DesigIc::first();
        $ics_data = DB::table('distributes')
            ->where('ics','=', $icsNum)
            ->where('item_type', '!=', 'consumable')
            ->get();
        foreach ($ics_data as $data){
            $receivedBy = $data->receiver;
            $position2 =  $data->position;
        }
            $pdf = PDF::loadView('form.ics', compact('ics_data','icsNum','receivedBy','position2','desig'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
