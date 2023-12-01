<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\CartItem;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class CardItems extends Component
{
    public $detail;
    public $fooddetail;

    #[On('cart-change')]
    public function render()
    {
        return view('livewire.components.card-items', ['detail' => $this->detail, 'food' => $this->fooddetail]);
    }

    public function increment(CartItem $cartItem)
    {
        DB::transaction(function () use ($cartItem) {
            $price = $cartItem->food->price;

            $cartItem->increment('quantity');

            $cartItem->food_price += $price;
            $cartItem->save();

            $cartItem->cart->total_price += $price;
            $cartItem->push();
        });
        $this->dispatch('cart-change');
    }

    public function decrement(CartItem $cartItem)
    {
        DB::transaction(function () use ($cartItem) {
            $price = $cartItem->food->price;

            $cartItem->decrement('quantity');

            $cartItem->food_price -= $price;
            $cartItem->save();

            $cartItem->cart->total_price -= $price;
            $cartItem->push();
        });
        $this->dispatch('cart-change');
    }

    public function remove(CartItem $cartItem)
    {
        DB::transaction(function () use ($cartItem) {
            $price = $cartItem->food->price;
            $cartItem->cart->total_price -= $price;
            $cartItem->push();

            $cartItem->delete();
        });

        return redirect()->route('cart.view');
    }
}
