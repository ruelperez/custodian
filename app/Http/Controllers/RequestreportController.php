<?php

namespace App\Http\Controllers;

use App\Models\BackupRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestreportController extends Controller
{
    public function pdf($prNum){
        $request_data = BackupRequest::where('pr_num','=', $prNum)
            ->get();
        foreach ($request_data as $data){
            $date = $data->created_at->format('Y-m-d');
        }
        $pdf = PDF::loadView('form.request-report', compact('request_data','prNum','date'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
