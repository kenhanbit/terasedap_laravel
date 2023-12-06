<?php

namespace App\Livewire\Components;

use App\Models\CanceledOrder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleteModal extends Component
{
    public $orderId;
    public $cancel_reason;

    public function render()
    {
        return view('livewire.components.delete-modal', ['orderId' => $this->orderId]);
    }

    public function deleteOrder(Order $order)
    {
        // $validated = request()->validate([
        //     'cancel_reason' => 'required'
        // ]);

        DB::transaction(function () use ($order) {
            $canceled = new CanceledOrder();
            $canceled->order_id = $order->id;
            $canceled->canceled_reason = $this->cancel_reason;
            $canceled->save();

            $order->status = 'canceled';
            $order->save();

            $order->delete();
        });

        $this->reset();

        $this->dispatch('close-delete-modal');
        $this->dispatch('close-modal');

        return redirect()->route('admin.orders');
    }
}
