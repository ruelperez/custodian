<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockcardController extends Controller
{
    public function pdf($item){
        $stockcard_data = DB::table('stock_cards')
            ->where('item_name', '=', $item)
            ->orderBy('created_at','desc')
            ->get();
        $pdf = PDF::loadView('form.stockcard', compact('stockcard_data'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
