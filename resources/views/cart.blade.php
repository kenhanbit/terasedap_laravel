<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Document</title>
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
        @php $totalPrice = 0; @endphp
        @foreach($cartItems as $cartItem)
        <div class="wrapper">
            <div class="circle">{{ $cartItem->quantity }}</div>
            <div class="food-name-cart">{{ $cartItem->foodItem->name }} - {{ $cartItem->foodItem->price }}</div>
            <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="post">
                @csrf
                <button type="submit" class="circle2">
                    X
                </button>
            </form>

        </div>
        @php $totalPrice += $cartItem->foodItem->price * $cartItem->quantity; @endphp
        @endforeach
        <div class="addmore">
            <a href="{{ route('food-items') }}">
                <img src="images/addmorebutton.png" alt="" />
            </a>
        </div>

        <h3>Subtotal - Rp{{ $totalPrice }}</h3>

        <form action="{{ route('confirmOrder') }}" method="post">
            @csrf
            <div class="selection">
                <h3>Input Nomor Meja</h3>

                <select name="tableNumber" id="tableNumber">
                    @for($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
                <h3>Pillih Metode Pembayaran</h3>
                <select name="paymentMethod" id="paymentMethod">
                    <option value="cash">Cash</option>
                    <option value="qris">QRIS</option>
                    <option value="card">Card</option>
                </select>
            </div>

            <button type="submit" style="border: none; background: none; padding: 0;">
                <img src="images/orderbutton.png" alt="" style="max-width: 40vw;">
            </button>
        </form>

    </div>

</body>

</html>