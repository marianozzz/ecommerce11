<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProvinciaController;
use App\Http\Controllers\Admin\CiudadController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;





use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\CompraController;
use App\Http\Controllers\Admin\RoleController;


Route::prefix('admin')->group(function () {
    Route::resource('roles', RoleController::class);
});

Route::resource('compras', CompraController::class)->middleware('auth');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('provincias', App\Http\Controllers\Admin\ProvinciaController::class);
});



Route::resource('admin/usuarios', UserController::class)->names('admin.usuarios');


Route::resource('admin/settings', SiteSettingController::class)->only(['index', 'edit', 'update']);
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
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
    
// Rutas para ventas
Route::get('ventas/factura/{id}', [VentaController::class, 'generarFactura'])->name('admin.ventas.factura');
Route::resource('cart', CartController::class)->middleware('auth');
Route::get('/ciudades/{provinciaId}', [CiudadController::class, 'getCiudades']);

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('productos', ProductController::class);
Route::middleware(['auth'])->group(function () {
       Route::resource('categorias', CategoriaController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
       Route::resource('ventas', \App\Http\Controllers\Admin\VentaController::class);
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



Route::middleware('auth')->group(function () {
    Route::get('historial-compras', [CompraController::class, 'index'])->name('compras.index');
    Route::get('historial-compras/{compra}', [CompraController::class, 'show'])->name('compras.show');
});
