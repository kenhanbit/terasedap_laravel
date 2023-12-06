<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receipt</title>
    </head>
    <body>
        <div style="margin-left: 20vw; margin-right: 20vw">
            <div style="text-align: center;">
                <img src="{{asset('images/terasedap_logo.png')}}" style="width: 200px" alt="">
            </div>
            <div>
                <div>Order Date: {{ $order->created_at}}</div>
                <div>
                    Order Number: {{ $order->order_code }}
                </div>
                <div>Table Number: {{ $order->table_number}}</div>
            </div>
            <div>
                <h1>Order Items</h1>
                <div>
                    @foreach ($order->items as $item)
                    <div style="margin-bottom: 6px;">
                        <div style="padding: 4px;">
                            <div class="item-name">
                                {{ $item->menu_name}}
                            </div>
                            <div>
                                {{ $item->notes }}
                            </div>
                            <div style="display: flex; justify-content: space-between">
                                <div>
                                    x{{$item->quantity }} @ <span>Rp. {{number_format($item->single_price, 0,'', '.')}}</span>
                                </div>
                                <div>
                                    Rp. {{number_format($item->total_price, 0,'', '.')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div style="display: flex; justify-content: space-between">
                <h2>Subtotal</h2>
                <h2>
                    Rp. {{ number_format($order->total_price, 0, '', '.')}}
                </h2>
            </div>
        </div>
    </body>
</html>