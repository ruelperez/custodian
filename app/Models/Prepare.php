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
        'receiver',
        'item_type',
        'serial',
        'ics'
    ];

    use HasFactory;
}
