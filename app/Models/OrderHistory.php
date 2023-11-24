<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'order_histories';

    protected $fillable = [
        'order_date',
        'table_number',
        'payment_method',
        'price_per_item',
        'total_price'
        // Add other fields that you want to be mass-assignable here
    ];

    use HasFactory;
}
