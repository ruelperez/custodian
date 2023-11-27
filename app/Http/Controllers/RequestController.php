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
           }
           $pdf = PDF::loadView('form.form-request', compact('request_data','request','pr_num', 'date'))
               ->setPaper('legal','portrait');
           return $pdf->stream('load.pdf');
        }
    }
}
