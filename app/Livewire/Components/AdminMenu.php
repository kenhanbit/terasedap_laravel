<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AdminMenu extends Component
{
    public $detail;

    public function render()
    {
        return view('livewire.components.admin-menu');
    }
}
