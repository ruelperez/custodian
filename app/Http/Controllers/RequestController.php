<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function pdf(){
       $request_data = \App\Models\Request::all();
        $pdf = PDF::loadView('form.form-request', compact('request_data'))
            ->setPaper('legal','portrait');

        return $pdf->stream('load.pdf');
    }
}
