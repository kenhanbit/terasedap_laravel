<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    // Relationships
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    use HasFactory;
}
