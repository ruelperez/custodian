<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupPrepare extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'receiver',
        'item_type',
        'serial',
        'created_at',
        'ics',
        'ics_last',
    ];

    use HasFactory;
}
