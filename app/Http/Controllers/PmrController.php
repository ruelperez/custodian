<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PmrController extends Controller
{
    public function pdf($date){
        $request_data = BackupPrepare::all();
        $pdf = PDF::loadView('form.form-pmr', compact('request_data'))
            ->setPaper('legal','portrait');
    }
}
