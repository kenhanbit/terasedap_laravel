<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'food_item_name',
        'food_item_id',
        'quantity',
        'food_item_price',


    ];

    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }


    use HasFactory;
}
