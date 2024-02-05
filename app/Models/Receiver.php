<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $fillable = [
        'fullname',
        'position',
    ];

    use HasFactory;
}
