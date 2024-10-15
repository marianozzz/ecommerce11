<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\MercadoPagoConfig;
//use MercadoPago\PreferenceClient;
use MercadoPago\Client\Preference\PreferenceClient;

class PaymentController extends Controller
{
    public function createPreference(Request $request)
    {
        // Configura el Access Token de MercadoPago
    
       MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
    
 // Obteniendo los datos del carrito desde la sesión
 $cartItems = session('cart');
 $items = [];

 // Si el carrito no está vacío, mapear los datos al array de MercadoPago
 if ($cartItems) {
     foreach ($cartItems as $id => $detalle) {
         $items[] = [
             "id" => $id,                                    // ID del producto
             "title" => $detalle['nombre'],                   // Nombre del producto
             "description" => $detalle['nombre'],             // Descripción (puede personalizarse)
             "picture_url" => asset('storage/' . $detalle['imagen']), // URL de la imagen del producto
             "category_id" => "electronics",                  // ID de la categoría (puedes ajustar)
             "quantity" => $detalle['cantidad'],              // Cantidad de productos
             "currency_id" => "PESO",                          // Moneda (ajústala según tu necesidad)
             "unit_price" => $detalle['precio']               // Precio unitario del producto
         ];
     }
 }

       $client = new PreferenceClient();
       $preference = $client->create([
       "back_urls"=>array(
           "success" => "http://test.com/success",
           "failure" => "http://test.com/failure",
           "pending" => "http://test.com/pending"
       ),
       "items" => array(
           array(
               "id" => "1234",
               "title" => "Dummy Title",
               "description" => "Dummy description",
               "picture_url" => "http://www.myapp.com/myimage.jpg",
               "category_id" => "car_electronics",
               "quantity" => 2,
               "currency_id" => "BRL",
               "unit_price" => 100
           )
       ),
     
       ]);
       
      // dd($items);
       dd($preference);
       echo implode($preference);
    }
}
