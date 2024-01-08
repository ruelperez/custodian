<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAdditional extends Model
{
    protected $fillable = [
        'supplier',
        'address',
        'tin',
        'po_num',
        'mode',
        'total',
        'total_words',
        'chief',
        'place_delivery',
        'date_delivery',
        'delivery_term',
        'payment_term',
    ];

    use HasFactory;
}
