<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $guarded = [];

    // Define relationships
    public function foodItem(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'order_code');
    }

    use HasFactory;
}
