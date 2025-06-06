<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\Compra;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index()
    {
        // Obtiene las compras del usuario autenticado
        $compras = auth()->user()->compras()->orderBy('fecha_compra', 'desc')->get();

        return view('usuarios.compras.index', compact('compras'));
    }

   /* public function store(Request $request)
    {
        // Obtener el carrito de compras del usuario (puedes ajustarlo según tu implementación)
        $carrito = session()->get('cart', []);  // Asume que el carrito está almacenado en la sesión

       // dd($carrito);
        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        // Iniciar una transacción para asegurar la inserción correcta de venta y detalles
        DB::beginTransaction();

        try {
            // Crear una nueva venta
            $venta = new Venta();
            $venta->user_id = Auth::id(); // Asocia la venta al usuario actual
            $venta->total = collect($carrito)->sum(function ($item) {
                return $item['precio'] * $item['cantidad'];
            });
            $venta->fecha = now();
            $venta->fecha = date('Y-m-d h:i:s', strtotime($venta->fecha));
          //  dd($venta);
            $venta->save();

            // Insertar los detalles de la venta
         
            foreach ($carrito as $item) {
                $detalleVenta = new DetalleVenta();
                $detalleVenta->venta_id = $venta->id;
                $detalleVenta->producto_id = $item['id'];
                $detalleVenta->cantidad = $item['cantidad'];
                $detalleVenta->precio = $item['precio'];
              
               // dd($item);
                $detalleVenta->save();
            }

            // Confirmar la transacción
            DB::commit();

            // Limpiar el carrito después de la compra
            session()->forget('cart');
            return redirect()->route('cart.index')->with('success', 'Compra realizada con éxito. ¡Gracias por tu compra!');
           // return redirect()->route('ventas.index')->with('success', 'Compra realizada con éxito.');
        } 
        catch (\Exception $e) 
        {
            // Revertir la transacción en caso de error
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al procesar la compra.');
        }
    }*/


    public function store(Request $request)
{
    //dd($request);
    // Obtener el carrito de compras del usuario (ajústalo según tu implementación)
    $carrito = session()->get('cart', []);  // Asume que el carrito está almacenado en la sesión
//dd($carrito);
    if (empty($carrito)) {
        return redirect()->back()->with('error', 'El carrito está vacío.');
    }

    // Iniciar una transacción para asegurar la inserción correcta de venta y detalles
    DB::beginTransaction();

    try {
        // Crear una nueva venta en la tabla `ventas`
        $venta = new Venta();
        $venta->user_id = Auth::id(); // Asocia la venta al usuario actual
        $venta->total = collect($carrito)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });
        $venta->fecha = now();
        $venta->save();

       // dd($venta);
        // Insertar los detalles de la venta en la tabla `detalle_ventas`
        foreach ($carrito as $item) {
            $detalleVenta = new DetalleVenta();
            $detalleVenta->venta_id = $venta->id;
            $detalleVenta->producto_id = $item['id'];
            $detalleVenta->cantidad = $item['cantidad'];
            $detalleVenta->precio = $item['precio'];
         
          //  dd($detalleVenta);
            $detalleVenta->save();

            
        }

        // Registrar la compra en la tabla `compras` (para el historial del usuario)
        $compra = new Compra();
        $compra->user_id = Auth::id();
        $compra->venta_id = $venta->id;
        $compra->total = $venta->total;
        $compra->fecha_compra = $venta->fecha;
        $compra->save();
//dd($compra);
        // Confirmar la transacción
        DB::commit();

        // Limpiar el carrito después de la compra
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Compra realizada con éxito. ¡Gracias por tu compra!');

    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
       DB::rollBack();
        return redirect()->back()->with('error', 'Ocurrió un error al procesar la compra.');
    }
}

}
