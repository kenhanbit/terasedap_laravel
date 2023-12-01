<?php

namespace App\Livewire\Components;

use App\Models\CartItem;
use App\Models\Cart;
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
            ->where('status', 'cart')
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
        if (session()->has('table') && session()->has('order_code')) {
            $code = session()->get('order_code');
            DB::transaction(function () use ($code) {
                CartItem::create([
                    'food_item_id' => $this->item->id,
                    'quantity' => 1,
                    'food_price' => $this->item->price,
                    'order_code' => $code,
                ]);

                $cart = Cart::where('order_code', $code)->first();
                $cart->total_price += $this->item->price;
                $cart->save();
            });
        } else {
            session()->flash('scan-table', 'Please scan the QR code on the table.');
        }
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
    }

    public function remove(CartItem $cartItem)
    {
        DB::transaction(function () use ($cartItem) {
            $price = $cartItem->food->price;
            $cartItem->cart->total_price -= $price;
            $cartItem->push();

            $cartItem->delete();
        });
    }
}
