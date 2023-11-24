<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['food_item_id', 'quantity'];

    // Define relationships
    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }

    use HasFactory;
}
