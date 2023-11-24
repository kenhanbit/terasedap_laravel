<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\CartItem;
use App\Models\FoodItem;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function addToCart(Request $request, $foodItemName, $foodItemId, $foodItemPrice)
    {
        // Assuming $foodItemId comes from the route or form input
        // You can validate the input and perform necessary checks

        // Example: Add the food item to the cart with a default quantity of 1
        $cartItem = Cart::create([
            'food_item_name' => $foodItemName,
            'food_item_id' => $foodItemId,
            'quantity' => 1,
            'food_item_price' => $foodItemPrice,
        ]);

        // You might add validation or error handling here

        return redirect()->back()->with('success', 'Item added to cart');
    }

    public function removeFromCart(Request $request, $cartItemId)
    {
        // Assuming $cartItemId comes from the route or form input
        // Find and delete the cart item
        Cart::destroy($cartItemId);

        // You might add validation or error handling here

        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function viewCart()
    {
        // Fetch all items in the cart
        $cartItems = Cart::all();

        // Pass $cartItems to the cart view for display
        return view('cart', compact('cartItems'));
    }

    public function confirmOrder(Request $request)
    {
        $orderDate = now();
        $tableNumber = $request->input('tableNumber');
        $paymentMethod = $request->input('paymentMethod');
        $cartItems = Cart::all();

        // Create a new order instance for the main 'orders' table
        $order = new Order();
        $order->order_date = $orderDate;
        $order->table_number = $tableNumber;
        $order->payment_method = $paymentMethod;
        $order->cart_items = $cartItems; // Store cart items as JSON data

        // Create a new order instance for the 'orders_history' table
        $orderHistory = new OrderHistory();
        $orderHistory->order_date = $orderDate;
        $orderHistory->table_number = $tableNumber;
        $orderHistory->payment_method = $paymentMethod;
        $orderHistory->cart_items = $cartItems; // Store cart items as JSON data

        // Wrap the database transaction to ensure atomicity
        DB::transaction(function () use ($order, $orderHistory, $request) {
            // Save the order to the 'orders' table
            $order->save();

            // Save the order to the 'orders_history' table
            $orderHistory->save();

            // Clear the cart items from the session if needed
            $request->session()->forget('cartItems');
        });

        return redirect()->route('food-items');
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
