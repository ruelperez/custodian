<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Par extends Model
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
        'total_cost',
        'parnum',
        'property_num',
        'date_acquired',
        'amount',
        'position',
        'component_id'
    ];

    use HasFactory;
}
