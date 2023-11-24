<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'food_item_id',
        'food_item_name',
        'quantity',
        'price_per_item',
        'total_price',
        // Add other fields that you want to be mass-assignable here
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    use HasFactory;
}
