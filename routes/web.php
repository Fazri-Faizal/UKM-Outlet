<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/completeOrder', function () {
    return view('completeOrder');
});

Route::get('/product-list-web', function () {
    return view('product-list-web');
});

Route::get('/product-list-web', function () {
    return view('product-list-web');
});
Route::get('/header', function () {
    return view('header');
});