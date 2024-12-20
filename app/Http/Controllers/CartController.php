<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;


class CartController extends Controller
{
    // Función para agregar productos al carrito
    public function add($id)
    {
        $producto = Producto::findOrFail($id);
       // dd($producto);
        // Agregar producto al carrito (puedes usar sesiones o una tabla de carrito en la base de datos)
        $cart = session()->get('cart', []);

        // Si el producto ya está en el carrito, incrementa la cantidad
        if (isset($cart[$id])) 
        {
            $cart[$id]['cantidad']++;
        } else 
        {
            // Si no está en el carrito, lo añadimos con cantidad 1
            $cart[$id] = [
                "id" => $id, //Id del cliente
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        //dd($cart);
        }

        session()->put('cart', $cart); // Guardamos el carrito en la sesión
        //dd($cart);
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    // Función para mostrar el contenido del carrito
    public function index()
    {
        
        $cart = session()->get('cart');
       // dd($cart);
        return view('cart.index', compact('cart'));
    }
    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

}
