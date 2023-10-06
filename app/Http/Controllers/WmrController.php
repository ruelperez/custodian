<?php

namespace App\Http\Controllers;

use App\Models\MovedItem;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class WmrController extends Controller
{
    public function pdf($teacher){
        $request_data = MovedItem::where('receiver', $teacher)->get();
        $request = "request";
        $pdf = PDF::loadView('form.wmr', compact('request_data','request'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }

}
