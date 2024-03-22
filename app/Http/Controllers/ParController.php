<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use App\Models\DesigPar;
use App\Models\Par;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ParController extends Controller
{
    public function pdf($date){
        $item_name;
        $serial = $date;
        $data = BackupPrepare::where('serial','=',$date)->get();
        foreach ($data as $datas){
        $item_name = $datas->item_name;

        }
        $pdf = PDF::loadView('form.new_prop', compact('data','item_name','serial'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
