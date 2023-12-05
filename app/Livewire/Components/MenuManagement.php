<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\FoodItem;
use Livewire\Component;

class MenuManagement extends Component
{

    public function render()
    {
        $categories = Category::all();
        return view('livewire.components.menu-management', ['categories' => $categories]);
    }
}
