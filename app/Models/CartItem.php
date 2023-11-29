<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $guarded = [];

    // Define relationships
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'order_code', 'order_code');
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(FoodItem::class, 'food_item_id', 'id');
    }

    use HasFactory;
}
