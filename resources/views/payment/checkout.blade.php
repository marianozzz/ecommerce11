@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Finalizar Compra</h1>

    <div class="text-center">
        <!-- Botón de MercadoPago -->
        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script>
            const mp = new MercadoPago('{{ config('services.mercadopago.key') }}', {
                locale: 'es-AR'
            });

            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.mercadopago-button', // Indica el botón donde se va a generar
                    label: 'Pagar con MercadoPago', // Texto del botón
                }
            });
        </script>

        <div class="mercadopago-button"></div>
    </div>
</div>
@endsection
