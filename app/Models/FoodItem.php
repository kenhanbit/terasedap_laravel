<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $fillable = ['name', 'price', 'category', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}