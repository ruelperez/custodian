<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use App\Models\DesigPar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PropController extends Controller
{
    public function pdf($date){
        $item_name;
        $serial = $date;
        $desig = DesigPar::first();
        $request_data = BackupPrepare::where('serial','=',$date)->get();
        foreach ($request_data as $datas){
            $item_name = $datas->item_name;
            $par_num = $datas->par_num;
            $receivedBy = $datas->receiver;
            $position = $datas->position;
            $dates = $datas->updated_at;
        }
        $pdf = PDF::loadView('form.prop_par', compact('request_data','item_name','serial','par_num','desig','receivedBy','position','dates'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
