<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Compra;
use App\Models\User;
use App\Models\Producto;

class AdminController extends Controller
{
    public function index()
    {
        // Ejemplo de métricas para pasar a la vista
        $totalVentas = Venta::count();
        $totalCompras = Compra::count();
        $totalUsuarios = User::count();
        $totalProductos = Producto::count();

        return view('admin.index', compact('totalVentas', 'totalCompras', 'totalUsuarios', 'totalProductos'));
    }
}
