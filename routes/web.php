<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupplierController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', [CustomerHomeController::class, 'customerhome'])->name('CustomerHome');

Route::prefix('/customer')->group(function () {
    Route::get('/login', [CustomerHomeController::class, 'login'])->name('CustomerLogin');

    Route::get('/shop', [CustomerHomeController::class, 'shop'])->name('Shop');
    Route::get('/shop/category', [CustomerHomeController::class, 'category'])->name('Category');
    Route::get('/shop/blog', [CustomerHomeController::class, 'blog'])->name('Blog');
    Route::get('/shop/cart', [CustomerHomeController::class, 'cart'])->name('Cart');
    Route::get('/shop/detail', [CustomerHomeController::class, 'detail'])->name('Detail');
    Route::get('/shop/about', [CustomerHomeController::class, 'about'])->name('About');
    Route::get('/shop/contact', [CustomerHomeController::class, 'contact'])->name('Contact');
    Route::get('/shop/checkout', [CustomerHomeController::class, 'checkout'])->name('Checkout');
});

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('AdminLogin');
Route::post('/admin/loginprocess', [LoginController::class, 'login'])->name('AdminLoginProcess');
Route::get('/logout', [loginController::class, 'Adminlogout'])->name('Admin.logout');
Route::middleware(['admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        //order
        Route::get('/orderlist', [OrderController::class, 'list'])->name('OrderList');

        //product
        Route::get('/productlist', [ProductController::class, 'productlist'])->name('ProductList');
        Route::get('/productlist/create', [ProductController::class, 'productcreate'])->name('ProductCreate');
        Route::post('/product/data', [ProductController::class, 'productdata'])->name('ProductData');
        Route::post('/product/createprocess', [ProductController::class, 'createprocess'])->name('ProductCreateProcess');
        Route::get('/product/edit/{id}', [ProductController::class, 'productedit'])->name('ProductEdit');
        Route::patch('/product/edit/process', [ProductController::class, 'producteditprocess'])->name('ProductEditProcess');
        Route::get('/product/delete/{id}', [ProductController::class, 'productdelete'])->name('ProductDelete');

        //search
        Route::post('/staff/search', [StaffController::class, 'search'])->name('StaffSearch');
        Route::post('/product/search', [ProductController::class, 'search'])->name('ProductSearch');
        Route::post('/customer/search', [CustomerController::class, 'search'])->name('CustomerSearch');

        //supplier
        Route::get('/supplierlist', [SupplierController::class, 'supplierlist'])->name('Supplier.List');
        Route::get('/supplier/create', [SupplierController::class, 'suppliercreate'])->name('Supplier.Create');
        Route::post('/supplier/create/process', [SupplierController::class, 'suppliercreateprocess'])->name('SupplierCreateProcess');
        Route::get('/supplier/edit/{id}', [SupplierController::class, 'supplieredit'])->name('SupplierEdit');
        Route::patch('/supplier/edit/process', [SupplierController::class, 'suppliereditprocess'])->name('SupplierEditProcess');
        Route::get('supplier/delete/{id}', [SupplierController::class, 'supplierdelete'])->name('SupplierDelete');

        //category
        Route::get('/category', [CategoryController::class, 'category'])->name('Category');
        Route::get('/caregory/create', [CategoryController::class, 'categorycreate'])->name('CategoryCreate');
        Route::post('/category/createprocess', [CategoryController::class, 'categorycreateprocess'])->name('CategoryCreateProcess');
        Route::get('/category/edit/{id}', [CategoryController::class, 'categoryedit'])->name('CategoryEdit');
        Route::patch('/category/edit/process', [CategoryController::class, 'categoryupdate'])->name('CategoryUpdate');
        Route::get('/category/delete/{id}', [CategoryController::class, 'categorydelete'])->name('CategoryDelete');

        //customer
        Route::get('/customerlist', [CustomerController::class, 'customerlist'])->name('CustomerList');
        Route::get('/customerlist/create', [CustomerController::class, 'customercreate'])->name('CustomerCreate');
        Route::post('/customerlist/create/process', [CustomerController::class, 'customercreateprocess'])->name('CustomerCreateProcess');
        Route::get('/customerlist/delete/{id}', [CustomerController::class, 'customerdelete'])->name('CustomerDelete');

        //staff
        Route::get('/stafflist', [StaffController::class, 'stafflist'])->name('StaffList');
        Route::get('/stafflist/create', [StaffController::class, 'staffcreate'])->name('StaffCreate');
        Route::post('/stafflist/create/process', [StaffController::class, 'createprocess'])->name('CreateProcess');
        Route::get('/staffedit/{id}', [StaffController::class, 'staffedit'])->name('staff.edit');
        Route::patch('/stafflist/edit/process', [StaffController::class, 'staffupdate'])->name('UpdateProcess');
        Route::get('/stafflist/delete/{id}', [StaffController::class, 'staffdelete'])->name('StaffDelete');
        Route::get('/dashboard', [StaffController::class, 'showdashboard'])->name('Dashboard');
    });
});
