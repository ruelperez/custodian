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
        'teachers_name',
        'item_type',
    ];

    use HasFactory;
}
