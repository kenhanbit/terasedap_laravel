<?php

namespace App\Livewire\Components;

use App\Models\CartItem;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MenuCard extends Component
{
    public $item;
    public $added = false;


    public function render()
    {
        $code = session()->get('order_code');

        $cart_item = CartItem::where('order_code', $code)
            ->where('food_item_id', $this->item->id)
            ->first();


        if ($cart_item) {
            $this->added = true;
        } else {
            $this->added = false;
        }

        return view('livewire.components.menu-card', ['item' => $this->item, 'added' => $this->added, 'cart_item' => $cart_item]);
    }


    public function addItem()
    {
        $code = session()->get('order_code');
        CartItem::create([
            'food_item_id' => $this->item->id,
            'quantity' => 1,
            'food_price' => $this->item->price,
            'order_code' => $code,
        ]);
    }

    public function increment(CartItem $cartItem)
    {
        $cartItem->increment('quantity');
    }

    public function decrement(CartItem $cartItem)
    {
        $cartItem->decrement('quantity');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
    }
}
