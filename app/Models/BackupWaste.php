<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupWaste extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'receiver',
        'serial',
    ];

    use HasFactory;
}
