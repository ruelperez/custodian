<?php

namespace App\Http\Controllers;

use App\Models\MovedItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function pdf($request){
       if($request == "request" or $request == "order"){
           $request_data = \App\Models\Request::all();
           $pdf = PDF::loadView('form.form-request', compact('request_data','request'))
               ->setPaper('legal','portrait');
        }
       else{
           $request_data = MovedItem::where('receiver', $request)->get();
           $request = "request";
           $pdf = PDF::loadView('form.form-request', compact('request_data','request'))
               ->setPaper('legal','portrait');
       }

        return $pdf->stream('load.pdf');
    }
}
