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

Route::get('/product-list-faculty-web', function () {
    return view('product-list-faculty-web');
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

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/button_counter', function () {
    return view('button_counter');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/test3d', function () {
    return view('test3d');
});

Route::get('/button_checkout', function () {
    return view('button_checkout');
});

Route::get('/button_color', function () {
    return view('button_color');
});

Route::get('/button_delete', function () {
    return view('button_delete');
});

Route::get('/button_size', function () {
    return view('button_size');
});

Route::get('/button_fpx', function () {
    return view('button_fpx');
});

Route::get('/Test3d', function () {
    return view('Test3d');
});

Route::get('/button_color_v2', function () {
    return view('button_color_v2');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/product-list-ukm-filter', function () {
    return view('product-list-ukm-filter');
});

Route::get('/product-list-filter', function () {
    return view('product-list-filter');
});
Route::get('/product-list-filter-faculty', function () {
    return view('product-list-filter-faculty');
});

Route::get('/button_fav', function () {
    return view('button_fav');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/user-profile', function () {
    return view('user-profile');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/destroy', function () {
    return view('destroy');
});
Route::get('/seller_dashboard', function () {
    return view('seller_dashboard');
});
Route::get('/seller_sidebar', function () {
    return view('seller_sidebar');
});
Route::get('/seller_order', function () {
    return view('seller_order');
});
Route::get('/seller_order_completed', function () {
    return view('seller_order_completed');
});
Route::get('/seller_order_toship', function () {
    return view('seller_order_toship');
});
Route::get('/seller_products', function () {
    return view('seller_products');
});
Route::get('/seller_add_product', function () {
    return view('seller_add_product');
});
Route::get('/seller_registration', function () {
    return view('seller_registration');
});
Route::get('/seller_registration_form', function () {
    return view('seller_registration_form');
});
Route::get('/button-delete-2', function () {
    return view('button-delete-2');
});
Route::get('/button_edit', function () {
    return view('button_edit');
});
Route::get('/delete_cart_item', function () {
    return view('delete_cart_item');
});

Route::get('/cart_checkout', function () {
    return view('cart_checkout');
});

Route::get('/function_addtocart', function () {
    return view('function_addtocart');
});

Route::get('/crud_add_product', function () {
    return view('crud_add_product');
});

Route::get('/crud_product_review', function () {
    return view('crud_product_review');
});

Route::get('/seller_messages', function () {
    return view('seller_messages');
});

Route::get('/crud_update_profile', function () {
    return view('crud_update_profile');
});

Route::get('/seller_registration_crud', function () {
    return view('seller_registration_crud');
});

Route::get('/seller_profile', function () {
    return view('seller_profile');
});
Route::get('/update_product', function () {
    return view('update_product');
});
Route::get('/crud_update_product', function () {
    return view('crud_update_product');
});
Route::get('/forgotpassword', function () {
    return view('forgotpassword');
});
Route::get('/updatepassword', function () {
    return view('updatepassword');
});
Route::get('/seller_analytics', function () {
    return view('seller_analytics');
});
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
});
Route::get('/admin_user', function () {
    return view('admin_user');
});
Route::get('/delete_user', function () {
    return view('delete_user');
});
Route::get('/seller_shop', function () {
    return view('seller_shop');
});
Route::get('/admin_login', function () {
    return view('admin_login');
});
Route::get('/destroy-admin', function () {
    return view('destroy-admin');
});
Route::get('/seller_delete_product', function () {
    return view('seller_delete_product');
});
Route::get('/admin_delete_user', function () {
    return view('admin_delete_user');
});
Route::get('/crud_admin_adduser', function () {
    return view('crud_admin_adduser');
});
Route::get('/crud_admin_edituser', function () {
    return view('crud_admin_edituser');
});