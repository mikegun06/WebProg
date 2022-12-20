<?php

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

Route::get('/', function () {
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});


// ROUTE BLADE

// Route::get('/', [
//     Book::class,'index'
// ])->name('home');
// Route::get('/pub', [
//     Publisher::class,'getAllPublisher'
// ])->name('publisher');
// Route::get('/book/category', [
//     BookCategory::class,'getBookbyCategory'
// ])->name('bookcat');
// Route::get('/book/detail{id}', [
//     BookDetail::class,'GetBookbyId'
// ])->name('bookdetail');
// Route::get('/publisher',[
//     Publisher::class,'getAllPublisher'
// ])->name('pub');
// Route::get('/publisher/detail{id}', [
//     Publisher::class, 'getPublisherbyId'
// ])->name('pubdetail');
// Route::get('/contact', [
//     Contact::class, 'index'
// ])->name('contact');