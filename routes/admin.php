<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Order_productController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Middleware\Admin;

use App\Http\Controllers\Auth\RegisteredUserController;


Route::name('dashboard.')->prefix('dashboard')->middleware('auth',Admin::class)->group(function () {
    Route::view('/','Admin.index');
    // Route::view('/','Admin.index');
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('order',Order_productController::class);
    Route::get('setting',[SettingController::class,'index'])->name('setting');
    Route::get('setting/{setting}/edit',[SettingController::class,'edit'])->name('Setting.edit');
    Route::PATCH('setting/{setting}',[SettingController::class,'update'])->name('Setting.update');
    Route::get('message',[ContactController::class,'index'])->name('contact');
    Route::post('admin/register', [RegisteredUserController::class, 'store'])->name('register');
    Route::view('register','Admin.admin-register');

    Route::get('user',[ContactController::class,'users'])->name('users');

});
