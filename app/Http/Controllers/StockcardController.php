<?php

namespace App\Http\Controllers;

use App\Models\StockCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockcardController extends Controller
{
    public function pdf($item){
        $stockcard_data = StockCard::where('item_name', '=', $item)
            ->orderBy('created_at','desc')
            ->get();
        foreach ($stockcard_data as $st){
            $stockNum = $st->stock_num;
        }
        $pdf = PDF::loadView('form.stockcard', compact('stockcard_data','item','stockNum'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
