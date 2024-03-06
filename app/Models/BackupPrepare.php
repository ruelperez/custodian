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
        'unit_cost',
        'receiver',
        'item_type',
        'serial',
        'created_at',
        'ics',
        'ics_last',
        'total_cost',
        'position',
        'transaction_name',
        'item_id',
        'item_status',
        'prop_num',
        'par_num',
        'is_stolen',
        'is_lost'
    ];

    use HasFactory;
}
