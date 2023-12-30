<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'unit_cost',
        'item_type',
        'total_cost',
        'created_at',
        'pr_num',
        'purpose',
        'requested_by',
        'approved_by',
        'designator',
    ];

    use HasFactory;
}
