<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('product', ProductController::class);
    Route::get('/index1/{id}', [ProductController::class, 'index1'])->name('product.index1');
    
    Route::resource('catagory', CatagoryController::class);
    Route::resource('order', OrderController::class);
    Route::resource('admin', AdminController::class);

    Route::get('/navigation/{name?}', function ($name){
        if($name == 'offer')
            return view('navigation.offer');
        if($name == 'customer_care')
            return view('navigation.customer_care');
        if($name == 'emi')
            return view('navigation.emi');
        if($name == 'privacy_policy')
            return view('navigation.privacy_policy');
        if($name == 'refund')
            return view('navigation.refund');
        if($name == 'order_status')
            return view('navigation.order_status');
    });

    Route::post('/addcart/{id}', [OrderController::class, 'addcart'])->name('order.addcart');
    Route::get('/showcart', [OrderController::class, 'showcart'])->name('order.showcart');
    Route::get('/deleteCart/{id}', [OrderController::class, 'deleteCart'])->name('order.deleteCart');
    
});

require __DIR__.'/auth.php';
