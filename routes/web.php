<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::resource('cart', CartController::class);

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('productos', ProductController::class);

Route::prefix('admin')->group(function () {
    Route::resource('productos', ProductoController::class)->names('admin.productos');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('categorias', \App\Http\Controllers\Admin\CategoriaController::class);
});

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', function () {
    // Aquí va la lógica de la vista de perfil
    return view('profile');
})->name('profile');

Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
use App\Http\Controllers\PaymentController;

Route::get('pago', [PaymentController::class, 'createPreference'])->name('payment.create');
Route::get('pago/exito', [PaymentController::class, 'success'])->name('payment.success');
Route::get('pago/fallo', [PaymentController::class, 'failure'])->name('payment.failure');
Route::get('pago/pendiente', [PaymentController::class, 'pending'])->name('payment.pending');
