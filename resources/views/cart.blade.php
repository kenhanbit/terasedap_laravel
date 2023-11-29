<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Terasedap - cart</title>
</head>
<body>
    <center>
        <div class="logo">
            <a href="{{ route('food-items') }}">
                <img src="{{ asset('images/terasedap_logo.png') }}" alt="logo" />
            </a>
        </div>
    </center>
    <div class="summary">
        <h2>Cart Summary</h2>
        <div id="cart-list">
            @foreach ($cart->items as $item)
            <livewire:Components.CardItems :detail="$item" :fooddetail="$item->food" wire:key="{{ $item->id }}" />
            @endforeach
        </div>
        <div class="addmore">
            <a href="{{ route('food-items') }}">
                <img src="images/addmorebutton.png" alt="" />
            </a>
        </div>
        <div class="subtotal">
            <p>Total Payment</p>
            <livewire:Components.Subtotal :cart="$cart" />
        </div>
        <form action="{{ route('confirmOrder') }}" method="post">
            @csrf
            <div class="selection">
                <h3>Select payment method</h3>
                <select name="paymentMethod" id="paymentMethod">
                    <option value="cash">Cash</option>
                    <option value="qris">QRIS</option>
                    <option value="card">Card</option>
                </select>
            </div>
            <div style="display: flex; width:100%; justify-content:flex-end;margin-top: 20px;">
                <button type="submit" class="cart-order">Place Order</button>
            </div>
        </form>
    </div>
</body>
</html>