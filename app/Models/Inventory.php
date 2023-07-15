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
        'inventory_number',
        'item_type',
    ];

    use HasFactory;
}
