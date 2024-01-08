<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesigPo extends Model
{
    protected $fillable = [
        'principal',
    ];

    use HasFactory;
}
