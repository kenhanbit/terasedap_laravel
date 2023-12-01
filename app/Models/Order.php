<?php

namespace App\Models;

use App\Models\CanceledOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory, SoftDeletes;


    // Relationships
    public function items()
    {
        return $this->hasMany(CartItem::class, 'order_code', 'order_code');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'order_code', 'order_code');
    }

    public function canceled(): HasOne
    {
        return $this->HasOne(CanceledOrder::class);
    }
}
