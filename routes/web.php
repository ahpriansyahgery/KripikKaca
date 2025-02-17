<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::delete('cart/{cartitemsId}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/update/{cartitemsId}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('checkout',[CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/process',[CheckoutController::class, 'store'])->name('process.store');
    Route::get('checkout/berhasil',[CheckoutController::class, 'success'])->name('berhasil.success');
    
    Route::get('dashboard',[HomeController::class, 'dashboard'])->name('dashboard');


    // User Dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->group(function(){
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });
    

    


    // admin dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/order',[AdminDashboard::class, 'order'])->name('order');
       
    });

});




Route::get('sign-in-goolge', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');


Route::get('menu', [ProductController::class, 'index'])->name('menu.index');
// Route::get('menu/{product}', [ProductController::class, 'show'])->name('menu.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
