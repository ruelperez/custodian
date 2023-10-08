<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PwmrreportController extends Controller
{
    public function pdf($name,$date){
        $pwmr_data = DB::table('backup_wastes')
            ->where('created_at','like', '%'.$date.'%')
            ->where('receiver', '=', $name)
            ->get();
    }
}
