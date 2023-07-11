<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'unit_cost',
        'inventory_number',
        'estimated',
        'item_type',
        'total_cost',
    ];

    use HasFactory;
}
