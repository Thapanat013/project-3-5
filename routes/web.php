<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Product as Product;
use App\Http\Controllers\Admin\Dashboard as Dashboard;
use App\Http\Controllers\Admin\Category as Category;
use App\Http\Controllers\Admin\Order as Order;
use App\Http\Controllers\PromoteController as Promote;
use App\Http\Controllers\OrderController as orders;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;






// Main route
Route::get('/', [Promote::class, 'index'])->name('main');

// Order related routes
Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');


Route::get('/cart', [CartController::class, 'show'])->name('cart.view');


// เพิ่มสินค้าในตะกร้า
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// ลบสินค้าออกจากตะกร้า
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/cart/{key}', [CartController::class, 'remove'])->name('cart.remove');


// เก็บข้อมูลในตะกร้า
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

// ลบสินค้าตาม key
Route::delete('/cart/{key}', [CartController::class, 'remove'])->name('cart.remove');


// หน้า login
// Route สำหรับแสดงฟอร์ม login
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// Route สำหรับทำการ login (POST)
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');

// หน้า logout
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// หน้า force logout
Route::post('logout/force', function () {
    Auth::logout();  // ออกจากระบบ
    session()->invalidate();  // ล้างข้อมูล session
    session()->regenerateToken();  // รีเจนเนอเรท token เพื่อความปลอดภัย

    return redirect('/');  // เปลี่ยนเส้นทางไปหน้าหลัก
})->name('logout.force');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // route dashboar
    Route::get('/', [Dashboard::class, 'index'])->name('index');

    // product
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [Product::class, 'index'])->name('index');
        Route::get('add', [Product::class, 'add'])->name('add');
        Route::post('add', [Product::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [Product::class, 'edit'])->name('edit');
        Route::post('edit/{id}', [Product::class, 'update'])->name('update');
        Route::get('delete/{id}', [Product::class, 'delete'])->name('delete');
    });

    // category
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [Category::class, 'index'])->name('index');
        Route::get('add', [Category::class, 'add'])->name('add');
        Route::post('add', [Category::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [Category::class, 'edit'])->name('edit');
        Route::post('edit/{id}', [Category::class, 'update'])->name('update');
        Route::get('delete/{id}', [Category::class, 'delete'])->name('delete');
    });

    // order
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', [Order::class, 'index'])->name('index');
    });
});
