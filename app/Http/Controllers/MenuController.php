<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodItem;

class MenuController extends Controller
{
    public function showMenu()
    {
        $foodItems = FoodItem::all();
        return view('menu', ['foodItems' => $foodItems]);
    }
}