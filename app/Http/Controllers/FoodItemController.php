<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FoodItem;

class FoodItemController extends Controller
{
    public function createForm()
    {
        $categories = Category::pluck('name', 'id');
        return view('add_food_item', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation (validate image upload, etc.) goes here

        // Store food item
        $foodItem = new FoodItem();
        $foodItem->name = $request->input('name');
        $foodItem->price = $request->input('price');
        $foodItem->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $foodItem->image = $imageName;
        }
        $foodItem->category_id = $request->input('category');


        $foodItem->save();

        return redirect('/add-food-item');
    }

    public function editForm($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('edit_food_item', compact('foodItem', 'categories'));
    }

    // Update the edited food item
    public function update(Request $request, $id)
    {
        // Validation (similar to store method) goes here

        $foodItem = FoodItem::findOrFail($id);
        $foodItem->name = $request->input('name');
        $foodItem->price = $request->input('price');
        $foodItem->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $foodItem->image = $imageName;
        }
        $foodItem->category_id = $request->input('category');
        $foodItem->save();

        return redirect('/add-food-item');
    }

    // Remove a food item
    public function destroy($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $foodItem->delete();

        return redirect('/add-food-item');
    }

    public function showDescription($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        return view('fooditem_description', ['foodItem' => $foodItem]);
    }

    public function displayAll()
    {
        $foodItems = FoodItem::with('category')->get();
        return view('display_food_items', compact('foodItems'));
    }

    public function addFoodItemView()
    {
        $foodItems = FoodItem::with('category')->get();
        $categories = Category::pluck('name', 'id');

        return view('add_food_item', compact('foodItems', 'categories'));
    }
}
