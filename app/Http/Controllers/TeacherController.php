<?php

namespace App\Http\Controllers;

use App\Models\BackupPrepare;
use App\Models\MovedItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function pdf($teacher){
        $teacher_data = BackupPrepare::where('receiver', $teacher)
            ->where('item_type', '!=', 'consumable')
            ->where('quantity', '>', 0)
            ->where('transaction_name', '=', 'property_ics')
            ->orderBy('created_at','desc')
            ->get();
        foreach ($teacher_data as $data){
            $ics = $data->ics;
        }
        $pdf = PDF::loadView('form.teacher', compact('teacher_data','ics','teacher'))
            ->setPaper('legal','portrait');
        return $pdf->stream('load.pdf');
    }
}
