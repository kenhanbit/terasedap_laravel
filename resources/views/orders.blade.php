<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Document</title>
</head>

<body>
    <nav>
        <center>
            <div class="logo">
                <img src="images/terasedap_logo.png" alt="logo" />
                <h2>Orders Recieved for the waiter</h2>
            </div>
        </center>
    </nav>
    <br>

    @if ($orders->isEmpty())
    <p>No orders found.</p>
    @else
    <div class="order_background">
        @foreach ($orders as $order)
        <h2>Meja {{ $order->table_number }}</h2>
        <ul>

            <li class="order">Order Date : {{ $order->order_date }}</li>

            @php
            $totalPrice = 0; // Initialize total price for each order
            @endphp

            @foreach(json_decode($order->cart_items, true) as $item)
            <li class="order">
                {{ $item['food_item_name'] }} | Rp.{{ $item['food_item_price'] }} X {{ $item['quantity'] }}
            </li>
            @php
            // Calculate subtotal for each item and add to the total price
            $subtotal = $item['food_item_price'] * $item['quantity'];
            $totalPrice += $subtotal;
            @endphp
            @endforeach

            <li class="order">Total: Rp.{{ $totalPrice }}</li>
            <li class="order">Pembayaran : {{ $order->payment_method }}</li>

        </ul>
        <br />
        <form method="POST" action="{{ route('orders.destroy', ['id' => $order->id]) }}">
            @csrf
            @method('DELETE')
            <button class="orderbutton" type="submit">Sudah Bayar</button>
        </form>
        @endforeach
    </div>
    @endif

</body>

</html>