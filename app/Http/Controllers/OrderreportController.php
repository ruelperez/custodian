<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderreportController extends Controller
{
    public function pdf($date){
        $request_data = DB::table('backup_orders')
            ->where('created_at','like', '%'.$date.'%')
            ->get();
        $pdf = PDF::loadView('form.order-report', compact('request_data','date'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
