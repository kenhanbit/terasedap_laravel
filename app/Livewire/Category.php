<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Category extends Component
{
    #[Layout('/components/layouts/app')]
    #[Title('Terasedap Category Management')]
    public function render()
    {
        return view('livewire.category');
    }
}
