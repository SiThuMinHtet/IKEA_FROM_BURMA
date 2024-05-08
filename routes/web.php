<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffContorller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('/admin/dashboard')->group(function () {
    // Route::get('/', [OrderController::class, 'dashboard'])->name('Dashboard');
    Route::get('/orderlist', [OrderController::class, 'list'])->name('OrderList');
    Route::get('/productlist', [ProductController::class, 'productlist'])->name('ProductList');
    Route::get('/productlist/create', [ProductController::class, 'productcreate'])->name('ProductCreate');
    Route::get('/customerlist', [CustomerController::class, 'customerlist'])->name('CustomerList');
    Route::get('/stafflist', [StaffContorller::class, 'stafflist'])->name('StaffList');
    Route::get('/stafflist/create', [StaffContorller::class, 'staffcreate'])->name('StaffCreate');
});

Route::prefix('/customer/')->group(function () {
    Route::get('/login', [CustomerHomeController::class, 'login'])->name('CustomerLogin');
    Route::get('/home', [CustomerHomeController::class, 'customerhome'])->name('CustomerHome');
    Route::get('/shop', [CustomerHomeController::class, 'shop'])->name('Shop');
    Route::get('/shop/category', [CustomerHomeController::class, 'category'])->name('Category');
    Route::get('/shop/blog', [CustomerHomeController::class, 'blog'])->name('Blog');
    Route::get('/shop/cart', [CustomerHomeController::class, 'cart'])->name('Cart');
    Route::get('/shop/detail', [CustomerHomeController::class, 'detail'])->name('Detail');
    Route::get('/shop/about', [CustomerHomeController::class, 'about'])->name('About');
    Route::get('/shop/contact', [CustomerHomeController::class, 'contact'])->name('Contact');
    Route::get('/shop/checkout', [CustomerHomeController::class, 'checkout'])->name('Checkout');
});
