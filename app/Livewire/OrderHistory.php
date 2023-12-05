<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderHistory extends Component
{
    public $orders;
    public $selectedOrder;

    public function render()
    {
        $this->orders = Order::withTrashed()->orderBy('id', 'desc')->get();

        return view('livewire.order-history', ['orders' => $this->orders]);
    }

    public function selectOrder($orderId)
    {
        $this->selectedOrder = Order::withTrashed()->find($orderId);
        $this->dispatch('select_order');
    }
}
