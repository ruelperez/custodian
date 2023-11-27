<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCard extends Model
{
    protected $fillable = [
        'item_name',
        'receiptQty',
        'quantity',
        'unit',
        'receiver',
        'inventory_id',
        'stock_num',
    ];

    use HasFactory;
}
