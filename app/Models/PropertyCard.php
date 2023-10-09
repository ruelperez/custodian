<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCard extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'receiptQty',
        'unit',
        'receiver',
        'inventory_id'
    ];

    public function component(){
        return $this->hasMany(Component::class);
    }

    use HasFactory;
}
