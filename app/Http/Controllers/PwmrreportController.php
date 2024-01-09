<?php

namespace App\Http\Controllers;

use App\Models\DesigWmr;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PwmrreportController extends Controller
{
    public function pdf($name,$date){
        $desig = DesigWmr::first();
        $request_data = DB::table('backup_wastes')
            ->where('created_at','like', '%'.$date.'%')
            ->where('receiver', '=', $name)
            ->get();
        $pdf = PDF::loadView('form.pwmr', compact('request_data','date','desig'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
