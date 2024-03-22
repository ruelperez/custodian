<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovedItem extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'receiver',
        'item_type',
        'serial',
        'created_at',
        'backup_prepare_id',
        'transaction_name',
        'ics',
        'prop_num',
        'par_num',
    ];

    use HasFactory;
}
