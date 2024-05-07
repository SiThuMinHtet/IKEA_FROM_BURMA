<?php

use App\Http\Controllers\CustomerController;
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
