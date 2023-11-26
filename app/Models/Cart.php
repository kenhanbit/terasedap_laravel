<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $guarded = [];

    public function cartItem(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function generateCode($table)
    {
        $count = Cart::where('created_at', date('Y-m-d'))->count();
        $count += 1;
        return date('Ymd') . str_pad($table, 2, '0', STR_PAD_LEFT) . str_pad($count, 3, '0', STR_PAD_LEFT);
    }

    use HasFactory;
}
