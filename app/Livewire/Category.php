<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


class Category extends Component
{

    public $newCategory;


    public function addCategory()
    {
        ModelsCategory::create([
            'name' => $this->newCategory
        ]);

        $this->reset();
    }


    #[Layout('/components/layouts/app')]
    #[Title('Terasedap Category Management')]
    public function render()
    {
        return view('livewire.category');
    }
}
