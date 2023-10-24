<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\StripeController;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;


use App\Models\product;



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

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/your_cart', [HomeController::class, 'your_cart']);

Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/cancle_order/{id}', [HomeController::class, 'cancle_order']);

Route::get('/product-detail/{id}', [HomeController::class, 'product_detail']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::post('/cod_order', [HomeController::class, 'cod_order']);

Route::get('/your_orders', [HomeController::class, 'your_orders']);

Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

Route::get('/success',[StripeController::class, 'success'])->name('success');

Route::get('/cancle',[StripeController::class, 'cancle'])->name('cancle');

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    $data = product::all();
    if (Auth::id()) {
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', '=', $id)->get();
        $count = $cart->count();
        return view('dashboard', compact('data', 'count'));
    }
    return view('dashboard', compact('data'));
})->name('dashboard');



Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/redirect', [HomeController::class, 'redirect']);


    Route::get('/manage_user', [AdminController::class, 'manage_user']);

    Route::get('/ban_user/{id}', [AdminController::class, 'ban_user']);

    Route::get('/make_admin/{id}', [AdminController::class, 'make_admin']);

    Route::get('/remove_admin/{id}', [AdminController::class, 'remove_admin']);

    Route::get('/add_products', [AdminController::class, 'add_products']);

    Route::post('/adding_products', [AdminController::class, 'adding_products']);

    Route::get('/manage_products', [AdminController::class, 'manage_products']);

    Route::get('/manage_product/{id}', [AdminController::class, 'manage_product']);

    Route::post('/update_product/{id}', [AdminController::class, 'update_product']);

    Route::get('/remove_product/{id}', [AdminController::class, 'remove_product']);

    Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard']);

    Route::get('/manage_orders', [AdminController::class, 'manage_orders']);

    Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
});
