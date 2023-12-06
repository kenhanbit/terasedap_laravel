<?php

namespace App\Livewire\Components;

use App\Models\FoodItem;
use Livewire\Component;

class AdminMenu extends Component
{
    public $detail;

    public function render()
    {
        return view('livewire.components.admin-menu');
    }

    public function deleteItem(FoodItem $item)
    {
        $item->delete();

        return redirect()->route('admin.menu');
    }
}
