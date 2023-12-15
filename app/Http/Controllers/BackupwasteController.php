<?php

namespace App\Http\Controllers;

use App\Models\BackupWaste;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackupwasteController extends Controller
{
    public function pdf($date){
        $request_data = BackupWaste::select('item_name', 'unit', DB::raw('SUM(quantity) as total_quantity'))
            ->where('created_at', 'like', '%' . $date . '%')
            ->groupBy('item_name', 'unit')
            ->get();
        $pdf = PDF::loadView('form.waste_summary', compact('request_data','date'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
