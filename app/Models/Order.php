<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    // Relationships
    public function orderItems()
    {
        return $this->hasMany(CartItem::class, 'order_code', 'order_code');
    }
    use HasFactory;
}
