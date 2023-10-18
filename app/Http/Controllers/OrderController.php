<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pdf(){
        $request_data = \App\Models\Order::all();
        foreach ($request_data as $datas){
               $date = $datas->created_at->format('M-d-Y');
        }
        foreach ($request_data as $data){
            $po_num = $data->po_num;
        }
        $pdf = PDF::loadView('form.form-order', compact('request_data','po_num','date'))
            ->setPaper('legal','portrait');

        return $pdf->stream('load.pdf');
    }
}
