<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prepare extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'unit_cost',
        'receiver',
        'item_type',
        'serial',
        'ics',
        'position',
        'transaction_name',
        'item_status'
    ];

    use HasFactory;
}
