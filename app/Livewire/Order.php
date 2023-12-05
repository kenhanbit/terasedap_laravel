<?php

namespace App\Livewire;

use App\Models\Order as ModelsOrder;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;


class Order extends Component
{
    #[Layout('components/layouts/app')]
    public function render()
    {
        $orders = ModelsOrder::where('status', '!=', 'paid')->orderBy('table_number', 'asc')->get();
        return view('livewire.order', ['orders' => $orders]);
    }
}
