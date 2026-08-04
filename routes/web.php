<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome', ['categories' => Category::all()]);
});

// Breeze routes

Route::get('/dashboard', function () {
    $address = Address::where('user_id', Auth::id())->first();
    $orders = Order::where('user_id', Auth::id())->get();
    return view('dashboard', ['orders' => $orders, 'address' => $address],);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Shopping routes
Route::get('/shop/{category?}', function ($category = null) {
    $categories = Category::all();

    if($category){
       $category = Category::find($category);
       $products = Product::where('category_id', $category->id)->with('images')->get();
    } else {
        $category = null;
        $products = Product::with('images')->get();
    }

    return view('shopping.shop', ['categories' => $categories, 'products' => $products, 'category' => $category]);
});
Route::get('/productshop/{product}', [ProductController::class, 'productshop', CartController::class, 'store']);

// Product routes
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::get('/product/edit/{product}', [ProductController::class, 'edit']);
Route::put('/product/{product}', [ProductController::class, 'update']);
Route::delete('/product/{product}', [ProductController::class, 'destroy']);

// Category routes
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
Route::get('/category/edit/{category}', [CategoryController::class, 'edit']);
Route::put('/category/{category}', [CategoryController::class, 'update']);
Route::delete('/category/{category}', [CategoryController::class, 'destroy']);


// Cart routes
Route::get('/cart', [CartController::class, 'index']);
Route::put('/cart/{product}', [CartController::class, 'update']);
Route::delete('/cart', [CartController::class, 'destroy'])->middleware('auth');
Route::post('/cart/{product}', [CartController::class, 'store']);

// Address routes
Route::get('/address/create', [AddressController::class, 'create']);
Route::get('/address', [AddressController::class, 'index']);
Route::put('/address', [AddressController::class, 'update']);
Route::delete('/address/{address}', [AddressController::class, 'destroy']);
Route::post('/address', [AddressController::class, 'store']);
Route::get('/address/edit/{address}', [AddressController::class, 'edit']);

// Order routes
Route::get('/order/store/{address}', [OrderController::class, 'store']);

//Details
Route::get('/details/{order}', function (Order $order) {
    $address = Address::where('user_id', Auth::id())->first();
    return view('details', ['order' => $order, 'address' => $address],);
})->middleware(['auth', 'verified'])->name('order.details');

Route::get('/help', function () {
    return view('help');
});

Route::get('/about', function () {
    return view('about');
});



