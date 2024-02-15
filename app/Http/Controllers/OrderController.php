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
        if ($desig ==  null or $desig == ""){
            $principal = "";
        }
        else{
            $principal = $desig->principal;
        }
        $request_data = \App\Models\Order::all();
        $order = OrderAdditional::all();
        if (count($order) < 1){
            $additional = "";
            $date = "";
            $totalInWords = "";
        }
        else{
            foreach ($order as $orders){
                $additional = OrderAdditional::find($orders->id);
                $date = $orders->updated_at->format('M-d-Y');
                $totalInWords = $orders->total_words;
            }
        }
        $pdf = PDF::loadView('form.form-order', compact('request_data','additional','date','totalInWords','principal'))
            ->setPaper('legal','portrait');

        return $pdf->stream('load.pdf');
    }
}
