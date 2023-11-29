<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function __invoke()
    {
        $categories = Category::all();
        $foodItems = FoodItem::all();
        return view('display_food_items', ['foodItems' => $foodItems, 'categories' => $categories]);
    }
}
