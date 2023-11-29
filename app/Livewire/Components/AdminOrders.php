<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AdminOrders extends Component
{
    public $order;
    public function render()
    {

        return view('livewire.components.admin-orders', ['detail' => $this->order]);
    }
}
