<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesigPar extends Model
{
    protected $fillable = [
        'printedName',
        'position',
    ];

    use HasFactory;
}
