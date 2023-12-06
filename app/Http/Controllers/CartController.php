<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\FoodItem;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    public function viewCart()
    {
        if (!Session::has('order_code')) {
            return redirect()->route('scan_qr');
        }
        $cart = Cart::where('order_code', Session::get('order_code'))->where('status', 'pending')->first();
        $total = $cart->total_price;

        foreach ($cart->items as $item) {
            $price = (int)$item->food_price;
            $quantity = $item->quantity;
            $temp = $price * $quantity;
            $total += $temp;
        }

        // Pass $cartItems to the cart view for display
        return view('cart', ['cart' => $cart, 'total' => $total]);
    }

    public function confirmOrder(Request $request)
    {
        DB::transaction(function () use ($request) {

            $cart = Cart::where('order_code', Session::get('order_code'))->first();
            $cart->status = 'ordered';
            $cart->save();

            CartItem::where('order_code', Session::get('order_code'))->update([
                'status' => 'ordered',
            ]);

            $order = new Order();
            $order->order_code = Session::get('order_code');
            $order->table_number = Session::get('table');
            $order->total_price = $cart->total_price;
            $order->order_date = now();
            $order->payment_method = $request['paymentMethod'];
            $order->save();

            foreach ($cart->items as $item) {
                $orderItem = new OrderItem();
                $orderItem->quantity = $item->quantity;
                $orderItem->order_code = $item->order_code;
                $orderItem->menu_name = $item->food->name;
                $orderItem->single_price = $item->food->price;
                $orderItem->total_price = $item->food_price;
                $orderItem->notes = $item->notes;
                $orderItem->save();
            }
        });

        return redirect()->route('thank_you');
    }

    public function downloadReceipt($ordercode)
    {
        $order = Order::where('order_code', $ordercode)->first();
        // $pdf = Pdf::loadView('receipt', ['order' => $order]);
        // return $pdf->download('terasedap_receipt.pdf');
        return view('receipt', ['order' => $order]);
    }


    public function showOrder()
    {
        // Fetch all orders from the database
        $orders = Order::all();
        $cartItems = Cart::all();

        return view('orders', [
            'orders' => $orders,
            'cartItems' => $cartItems,
        ]);
    }

    public function showOrderHistories()
    {
        $orderHistories = OrderHistory::all();
        $cartItems = Cart::all();

        return view('orders_history', ['orderHistories' => $orderHistories, 'cartItems' => $cartItems]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();
            return redirect('/show-order')->with('success', 'Order deleted successfully');
        } else {
            return redirect('/show-order')->with('error', 'Order not found');
        }
    }
}
