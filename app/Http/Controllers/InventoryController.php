<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function pdf($request){
        $request_data = Inventory::all();
        $pdf = PDF::loadView('form.form-inventory', compact('request_data','request'))
            ->setPaper('legal','portrait');

        return $pdf->stream('load.pdf');
    }
}
