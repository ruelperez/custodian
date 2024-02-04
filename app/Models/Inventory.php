<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'unit_cost',
        'inventory_number',
        'item_type',
        'item_status',
    ];

    use HasFactory;

    public function stockcard(){
        return $this->hasMany(StockCard::class);
    }

    public function propertycard(){
        return $this->hasMany(PropertyCard::class);
    }
}
