<?php

namespace App\Livewire\Components;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class OrdersModal extends Component
{
    public $detail;
    public $name;

    #[On('close-modal')]
    public function render()
    {
        return view('livewire.components.orders-modal', ['detail' => $this->detail, 'name' => $this->name]);
    }

    public function receiveOrder(Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->status = 'received';
            $order->save();
        });
        $this->dispatch('close-modal');
    }

    public function payOrder(Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->status = 'paid';
            $order->save();

            $order->cart->status = 'paid';
            $order->push();

            foreach ($order->items as $items) {
                $items->status = 'paid';
                $order->push();
            }
        });
        $this->dispatch('close-modal');
    }
}
