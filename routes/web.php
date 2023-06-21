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

Route::get('/college-list-web', function () {
    return view('college-list-web');
});

Route::get('/faculty-list-web', function () {
    return view('faculty-list-web');
});

Route::get('/button_complete_order', function () {
    return view('button_complete_order');
});

Route::get('/rating', function () {
    return view('rating');
});

Route::get('/button_bubbly', function () {
    return view('button_bubbly');
});

Route::get('/button_order', function () {
    return view('button_order');
});

Route::get('/button_place_order', function () {
    return view('button_place_order');
});

Route::get('/title-logo', function () {
    return view('title-logo');
});

Route::get('/button_addtocartv1', function () {
    return view('button_addtocartv1');
});

Route::get('/button_addtocartv2', function () {
    return view('button_addtocartv2');
});

Route::get('/login-web', function () {
    return view('login-web');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/chekout', function () {
    return view('chekout');
});

Route::get('/button_counter', function () {
    return view('button_counter');
});