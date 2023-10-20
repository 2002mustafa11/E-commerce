<?php


use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\FavoriteController;
use App\Http\Controllers\Front\ProductController as ProductFront;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PaypalController;

use App\Http\Controllers\CartController as Cart;

use App\Http\Controllers\Front\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\locale;
use Illuminate\Support\Facades\App;


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

Route::get('lang/change', [HomeController::class,'lang'])->name('Lang')->middleware(locale::class);

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('review/{review}/{id}', [ReviewController::class, 'index'])->name('review')->middleware('auth');

Route::get('/contact',[HomeController::class,'contact'])->name('contact.index');
Route::post('/contact/store',[HomeController::class,'store'])->name('contact');

// auth/google
Route::get('google',[SocialiteController::class,'redirectGoogle'])->name('google');
Route::get('auth/google',[SocialiteController::class,'handleProviderCallback']);


// cart
Route::get('show/cart',[Cart::class,'index'])->name('show.cart');
Route::get('/cart/add/{product}', [Cart::class,'store'])->name('cart.add');
Route::get('/cart/destroy/{rowId}', [Cart::class,'destroy'])->name('cart.destroy');
Route::get('/cart/update/{rowId}', [Cart::class,'update'])->name('cart.update');

// favorite
Route::get('/favorite',[FavoriteController::class,'index'])->name('favorite')->middleware('auth');
Route::get('/favorite/store/{product_id}',[FavoriteController::class,'store'])->name('favorite.store')->middleware('auth');
Route::get('/favorite/destroy/{product_id}',[FavoriteController::class,'destroy'])->name('favorite.destroy')->middleware('auth');


// shop
Route::post('/search', [ProductFront::class, 'search'])->name('search');
Route::get('/shop/{category_id?}',[ProductFront::class,'index'])->name('shop');
Route::get('/shop/show/{id}',[ProductFront::class,'show'])->name('show');

// order
Route::get('order',[OrderController::class,'index'])->name('order')->middleware('auth');
Route::post('order',[OrderController::class,'store'])->name('store.order')->middleware('auth');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::get('/paypal', [PaypalController::class, 'showPaymentPage'])->name('paypal')->middleware('auth');
Route::post('/paypal/process', [PaypalController::class, 'processPayment'])->name('paypal.process')->middleware('auth');
Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel')->middleware('auth');
Route::get('/paypal/success', [PaypalController::class, 'success'])->name('paypal.success')->middleware('auth');

// Route::get('/payment', [App\Http\Controllers\paypalController::class, 'showPaymentPage'])->name('payment.show');
// Route::post('/payment/process', [App\Http\Controllers\paypalController::class, 'processPayment'])->name('payment.process');
