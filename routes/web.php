<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProvinciaController;
use App\Http\Controllers\Admin\CiudadController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PaymentController;


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('provincias', App\Http\Controllers\Admin\ProvinciaController::class);
});

Route::prefix('admin')->name('admin.')->
       group(function() {
       Route::resource('provincias', App\Http\Controllers\Admin\ProvinciaController::class);
       Route::resource('ciudades', App\Http\Controllers\Admin\CiudadController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('productos', ProductoController::class)->names('admin.productos');
});

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('categorias', \App\Http\Controllers\Admin\CategoriaController::class);
    });

Route::resource('cart', CartController::class);

Route::get('/ciudades/{provinciaId}', [CiudadController::class, 'getCiudades']);



Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('productos', ProductController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
});


Auth::routes();
// Ruta resource para el perfil de usuario
Route::resource('profile', PerfilController::class);


Route::get('/ciudades/{provincia_id}', [CiudadController::class, 'getCiudadesByProvincia']);

Route::get('/ciudades/{provincia}', [CiudadController::class, 'getCiudades']);

Route::get('/provincias/{provincia_id}/ciudades', [PerfilController::class, 'getCiudades']); 

Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

/**Mercado Pago */
Route::get('pago', [PaymentController::class, 'createPreference'])->name('payment.create');
Route::get('pago/exito', [PaymentController::class, 'success'])->name('payment.success');
Route::get('pago/fallo', [PaymentController::class, 'failure'])->name('payment.failure');
Route::get('pago/pendiente', [PaymentController::class, 'pending'])->name('payment.pending');
