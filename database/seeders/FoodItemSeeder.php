<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FoodItem;
use App\Models\Category;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        FoodItem::factory(20)->create()->each(function ($foodItem) use ($categories) {
            $category = $categories->random();
            $foodItem->category()->associate($category)->save();
        });
    }
}