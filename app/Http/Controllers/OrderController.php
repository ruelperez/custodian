<?php

namespace App\Http\Controllers;

use App\Models\DesigPo;
use App\Models\OrderAdditional;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pdf(){
        $desig = DesigPo::first();
        $principal = $desig->principal;
        $request_data = \App\Models\Order::all();
        $order = OrderAdditional::all();
        foreach ($order as $orders){
            $additional = OrderAdditional::find($orders->id);
            $date = $orders->updated_at->format('M-d-Y');
            $totalInWords = $orders->total_words;
        }
        $pdf = PDF::loadView('form.form-order', compact('request_data','additional','date','totalInWords','principal'))
            ->setPaper('legal','portrait');

        return $pdf->stream('load.pdf');
    }
}
