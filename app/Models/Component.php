<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'receiver',
        'property_number',
        'date_acquired',
        'amount',
        'property_card_id',
        'par_num',
        'position'
    ];

    use HasFactory;
}
