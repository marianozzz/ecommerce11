<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venta; // Asegúrate de importar el modelo Venta
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\DetalleVenta;



class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all(); // Obtiene todas las ventas
        return view('admin.ventas.index', compact('ventas'));
    }

    public function create()
    {
       
        $articulos = Articulo::all();

        return view('admin.ventas.create', compact('articulos'));
    }
    public function store(Request $request)
    {
        // Valida y guarda la nueva venta
      /*  $venta = new Venta();
        $venta->total = $request->total;
        $venta->user_id = Auth::user()->perfil;
        $venta->user_id = $request->user_id; // Asegúrate de tener un campo cliente_id en tu formulario
        $venta->save();
        return redirect()->route('admin.ventas.index')->with('success', 'Venta creada exitosamente.');*/



        // Obtener el carrito de la sesión
    $cart = session()->get('cart');
    if (!$cart) {
        return redirect()->route('admin.ventas.index')->with('error', 'El carrito está vacío.');
    }

    // Calcular el total
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    // Iniciar una transacción
    DB::beginTransaction();

    try {
        // Crear la venta
        $venta = Venta::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        // Crear los detalles de la venta
        foreach ($cart as $item) {
            DetalleVenta::create([
                'venta_id' => $venta->id, // Usamos el ID generado de la venta
                'producto_id' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio' => $item['precio'],
            ]);
        }

        // Confirmar la transacción
        DB::commit();

        // Limpiar el carrito
        session()->forget('cart');

        return redirect()->route('admin.ventas.index')->with('success', 'Venta registrada con éxito.');
    
    } catch (\Exception $e) {
        // Si algo falla, deshacemos la transacción
        DB::rollBack();

        return redirect()->route('admin.ventas.index')->with('error', 'Error al registrar la venta: ' . $e->getMessage());
    }
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('admin.ventas.show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('admin.ventas.edit', compact('venta'));
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->cliente_id = $request->cliente_id;
        $venta->detalle = $request->detalle;
        $venta->save();

        return redirect()->route('admin.ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('admin.ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }
}

