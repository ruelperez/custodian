<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pdf($request){
        $request_data = \App\Models\Order::all();
        $pdf = PDF::loadView('form.form-request', compact('request_data','request'))
            ->setPaper('legal','portrait');

        return $pdf->stream('load.pdf');
    }
}
