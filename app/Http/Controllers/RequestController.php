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
           $pdf = PDF::loadView('form.form-request', compact('request_data','request'))
               ->setPaper('legal','portrait');
        }
       elseif ($request == "order"){
           $request_data = Order::all();
           $pdf = PDF::loadView('form.form-request', compact('request_data','request'))
               ->setPaper('legal','portrait');
       }
        return $pdf->stream('load.pdf');
    }
}
