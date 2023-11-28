<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodItemController;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/generate-url/{table}', function ($table) {
    $url = URL::signedRoute('food-items', ['table' => $table], now()->addHour(), false);
    Session::put('table', $table);
    $date = date('Ymd');
    $count = Cart::where('created_at', $date)->count();
    $count += 1;
    $code = $date . str_pad($table, 2, '0', STR_PAD_LEFT) . str_pad($count, 3, '0', STR_PAD_LEFT);
    Session::put('order_code', $code);
    $cart = Cart::where('order_code', $code)->first();

    if (!$cart) {
        Cart::create([
            'table_number' => $table,
            'order_code' => $code,
            'total_price' => 0,
        ]);
    }

    return redirect($url);
});

Route::get('/menu', [FoodItemController::class, 'displayAll'])->name('food-items')->middleware('signed:relative');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('categories', CategoryController::class);
// Route::get('/menu', [MenuController::class, 'showMenu']);

Route::get('/add-food-item', [FoodItemController::class, 'createForm']);
Route::get('/add-food-item', [FoodItemController::class, 'addFoodItemView']);
Route::post('/add-food-item', [FoodItemController::class, 'store'])->name('fooditem.store');

Route::get('/edit_food_item/{id}/edit', [FoodItemController::class, 'editForm'])->name('food-item.edit');
Route::put('/edit_food_item/{id}', [FoodItemController::class, 'update'])->name('food-item.update');


Route::get('/fooditem/{id}/description', [FoodItemController::class, 'showDescription'])->name('fooditem.description');
Route::delete('/add-food-item/{id}', [FoodItemController::class, 'destroy'])->name('food_items.destroy');

// Route for displaying the edit form for a food item
Route::get('/add-food-item/{id}/edit', [FoodItemController::class, 'editForm'])->name('food_items.editForm');

Route::post('/add-to-cart/{name}/{id}/{price}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

Route::post('/confirm-order', [CartController::class, 'confirmOrder'])->name('confirmOrder');
Route::get('/show-order', [CartController::class, 'showOrder'])->name('showOrder');

Route::get('/show-order', [CartController::class, 'showOrder'])->name('orders.show');


Route::delete('/orders/{id}', [CartController::class, 'destroy'])->name('orders.destroy');

Route::get('/show-order-history', [CartController::class, 'showOrderHistories'])->name('order.show');

Route::get('/show-order-history', [CartController::class, 'showOrderHistories'])->name('orders.history');
