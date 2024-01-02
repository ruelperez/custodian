<?php

namespace App\Http\Controllers;

use App\Models\MovedItem;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function pdf($request){
       if($request == "request"){
           $request_data = \App\Models\Request::all();
           foreach ($request_data as $data){
               $date = $data->created_at->format('M-d-Y');
               $pr_num = $data->pr_num;
               $purpose = $data->purpose;
               $requested_by = $data->requested_by;
               $approved_by = $data->approved_by;
               $designator = $data->designator;
           }
           $pdf = PDF::loadView('form.form-request', compact('request_data','request','pr_num', 'date','purpose','requested_by','approved_by','designator'))
               ->setPaper('legal','portrait');
           return $pdf->stream('load.pdf');
        }
    }
}
