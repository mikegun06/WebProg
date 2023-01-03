<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/product/category/{category}', [HomeController::class, 'category'])->name('product.category');

//Product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/detail/{id}', [HomeController::class, 'show'])->name('product.detail');
Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/purchase', [CartController::class, 'purchase'])->name('cart.purchase');
Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

//Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
