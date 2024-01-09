<?php

namespace App\Http\Controllers;

use App\Models\DesigWmr;
use App\Models\MovedItem;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class WmrController extends Controller
{
    public function pdf($teacher){
        $date;
        $request_data = MovedItem::where('receiver', $teacher)->get();
        foreach ($request_data as $data){
            $date = $data->created_at;
        }
        $pdf = PDF::loadView('form.wmr', compact('request_data','date'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }

}
