<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesigPr extends Model
{
    protected $fillable = [
        'requestPrintedName',
        'requestDesignation',
        'approvedPrintedName',
        'approvedDesignation',
    ];

    use HasFactory;
}
