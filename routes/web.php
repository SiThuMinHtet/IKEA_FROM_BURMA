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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Payment start
Route::controller(StripePaymentController::class)->group(
    function () {
        Route::get('stripe', 'stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    }
);

//Payment end

// web.php
Route::get('/home/showlist', [CustomerHomeController::class, 'showlist'])->name('products.showlist');



Route::get('/', [CustomerHomeController::class, 'customerhome'])->name('CustomerHome');

Route::get('/customer/login', [CustomerController::class, 'showLoginForm'])->name('CustomerLogin');
Route::post('/customer/loginprocess', [LoginController::class, 'login'])->name('LoginProcess');

Route::get('/customer/create', [CustomerController::class, 'customercreate'])->name('CustomerCreate');
Route::post('/customer/create/process', [CustomerController::class, 'customercreateprocess'])->name('CustomerCreateProcess');
Route::patch('/customer/edit/process', [CustomerController::class, 'customerteditprocess'])->name('CustomerEditProcess');


// Route::get('/customerlist/edit/{id}', [CustomerController::class, 'customeredit'])->name('CustomerEdit');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
Route::post('cart/remove/{cartItemId}', [CartController::class, 'removeItem'])->name('cart.remove');

Route::get('/shop/checkout', [CartController::class, 'checkout'])->name('checkout');

// Route::post('/checkout/process', [StripePaymentController::class, 'processPayment'])->name('checkout.process');



Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/payment', [StripePaymentController::class, 'index'])->name('payment');
Route::post('/process-payment', [StripePaymentController::class, 'processPayment'])->name('checkout.process');
Route::get('/order/success', [StripePaymentController::class, 'success'])->name('order.success');

Route::get('/shop', [CustomerHomeController::class, 'shop'])->name('Shop');
Route::get('/shop/category', [CustomerHomeController::class, 'category'])->name('ShopCategory');
Route::get('/shop/blog', [CustomerHomeController::class, 'blog'])->name('Blog');
Route::get('/shop/detail/{id}', [CustomerHomeController::class, 'detail'])->name('Detail');
Route::get('/shop/detail/process', [CustomerHomeController::class, 'detailprocess'])->name('DetailProcess');
Route::get('/shop/about', [CustomerHomeController::class, 'about'])->name('About');
Route::get('/shop/contact', [CustomerHomeController::class, 'contact'])->name('Contact');
Route::get('/productlist', [CustomerHomeController::class, 'showlist'])->name('ShowList');

Route::get('/shop/sort', [CustomerHomeController::class, 'sortpopular'])->name('customer.shop.sort');
Route::get('/shop/sort/price', [CustomerHomeController::class, 'sortprice'])->name('customer.shop.sortPrice');
Route::get('/shop/sort/category', [CustomerHomeController::class, 'sortcategory'])->name('customer.shop.sortCategory');

Route::middleware(['customer'])->group(function () {
    // dd(Auth::user());
    // dd(session()->all());
    Route::prefix('/customer')->group(function () {
        //edit 
        //edit process
        Route::get('/logout', [loginController::class, 'Customerlogout'])->name('Customer.logout');
    });
});



Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('AdminLogin');
Route::post('/admin/loginprocess', [LoginController::class, 'login'])->name('LoginProcess');

Route::middleware(['admin'])->group(function () {

    // dd(Auth::user());
    Route::prefix('/admin')->group(function () {
        //order
        Route::get('/orderlist', [OrderController::class, 'list'])->name('OrderList');
        Route::post('/updateorderstatus', [OrderController::class, 'updateOrderstatus'])->name('updateOrderstatus');

        Route::get('/logout', [loginController::class, 'Adminlogout'])->name('Admin.logout');
        //product
        Route::get('/productlist', [ProductController::class, 'productlist'])->name('ProductList');
        Route::get('/productlist/create', [ProductController::class, 'productcreate'])->name('ProductCreate');
        Route::post('/product/data', [ProductController::class, 'productdata'])->name('ProductData');
        Route::post('/product/createprocess', [ProductController::class, 'createprocess'])->name('ProductCreateProcess');
        Route::get('/product/edit/{id}', [ProductController::class, 'productedit'])->name('ProductEdit');
        Route::patch('/product/edit/process', [ProductController::class, 'producteditprocess'])->name('ProductEditProcess');
        Route::get('/product/delete/{id}', [ProductController::class, 'productdelete'])->name('ProductDelete');

        //search
        Route::get('/staff/search', [StaffController::class, 'search'])->name('StaffSearch');
        Route::get('/product/search', [ProductController::class, 'search'])->name('ProductSearch');
        Route::get('/customer/search', [CustomerController::class, 'search'])->name('CustomerSearch');

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
