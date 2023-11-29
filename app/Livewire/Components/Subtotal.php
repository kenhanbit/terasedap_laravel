<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class Subtotal extends Component
{
    public $cart;

    #[On('cart-change')]
    public function render()
    {
        $total = $this->cart->total_price;

        return view('livewire.components.subtotal', ['total' => $total]);
    }
}
