<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCard extends Model
{
    protected $fillable = [
        'item_name',
        'receiptUnit',
        'unit',
        'receiver',
        'inventory_id'
    ];

    use HasFactory;
}
