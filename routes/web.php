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

Route::get('/header', function () {
    return view('header');
});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/completeOrder', function () {
    return view('completeOrder');
});

Route::get('/product-list-web', function () {
    return view('product-list-web');
});

Route::get('/product-list-college-web', function () {
    return view('product-list-college-web');
});

Route::get('/product-list-ukm-web', function () {
    return view('product-list-ukm-web');
});

Route::get('/product-details', function () {
    return view('product-details');
});
