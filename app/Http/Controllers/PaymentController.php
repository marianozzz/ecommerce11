<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

class PaymentController extends Controller
{
    public function createPreference(Request $request)
    {
        // Configura el Access Token de MercadoPago
    
       MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Crea un ítem en la preferencia (esto representa el producto)
        $item = new Item();
        $item->title = $request->input('title');  // El título del producto
        $item->quantity = $request->input('quantity');  // La cantidad
        $item->unit_price = (float)$request->input('price');  // El precio por unidad

        // Añadimos el ítem a la preferencia
        $preference->items = [$item];

        // Puedes agregar la URL de redireccionamiento después del pago
        $preference->back_urls = [
            'success' => route('pago.exito'),  // Ruta a donde redirigir después del pago exitoso
            'failure' => route('pago.fallo'),  // Ruta a donde redirigir si el pago falla
            'pending' => route('pago.pendiente') // Ruta para pagos pendientes
        ];

        // Definir que queremos que redirija automáticamente en éxito
        $preference->auto_return = 'approved';

        // Guardamos la preferencia
        $preference->save();

        // Devolver la URL de pago o un ID de preferencia
        return response()->json([
            'init_point' => $preference->init_point,  // URL de MercadoPago para redirigir al cliente
            'preference_id' => $preference->id
        ]);
    }
}
