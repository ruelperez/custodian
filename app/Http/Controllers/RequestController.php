<?php

namespace App\Http\Controllers;

use App\Models\DesigPr;
use App\Models\MovedItem;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function pdf($request){
       if($request == "request"){
           $desig = DesigPr::first();
           $name1 = $desig->requestPrintedName;
           $name2 = $desig->approvedPrintedName;
           $designation1 = $desig->requestDesignation;
           $designation2 = $desig->approvedDesignation;
           $request_data = \App\Models\Request::all();
           foreach ($request_data as $data){
               $date = $data->created_at->format('M-d-Y');
               $pr_num = $data->pr_num;
               $purpose = $data->purpose;
           }
           $pdf = PDF::loadView('form.form-request', compact('request_data','request','pr_num', 'date','purpose','name1','name2','designation1','designation2'))
               ->setPaper('legal','portrait');
           return $pdf->stream('load.pdf');
        }
    }
}
