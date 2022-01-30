<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/cart/{id}',[HomeController::class,'cart'])->name('cart');
Route::post('/cart/delete/{id}',[HomeController::class,'cartDelete'])->name('cart.destroy');
Route::get('/cart/show/',[HomeController::class,'cartShow'])->name('cart.show');
Route::post('/search',[HomeController::class,'search'])->name('search');
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

Route::get('/order/{id}',[OrderController::class,'orderView'])->name('order');
Route::post('/order/promo',[OrderController::class,'promo'])->name('promo');
Route::post('/order/store',[OrderController::class,'store'])->name('order.store');

Route::resource('/dashboard/product',ProductController::class,['name'=>'product']);
