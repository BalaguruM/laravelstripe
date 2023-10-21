<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/product', [ProductController::class, 'index'])->name('product');

//Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');

//Route::post('/checkout', [ProductController::class, 'stripePost'])->name('stripePost');

Route::get('/stripe/{amount}/{productname}', [StripeController::class, 'index'])->name('stripe');

Route::post('/stripe-charge', [StripeController::class, 'stripeCharge'])->name('stripe-charge');
/*
$request->user()->newSubscription(
        'default', 'price_monthly'
    )->create($request->paymentMethodId);*/