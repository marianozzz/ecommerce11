@extends('layouts.app') <!-- Extiende el layout base de Laravel -->

@section('title', 'Inicio')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Bienvenido a Nuestra Tienda</h1>

    <!-- Mostrar productos destacados si existen -->
    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            No hay productos disponibles en este momento.
        </div>
    @else
        <div class="row justify-content-center">
            @foreach($products as $product)
                <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm product-card">
                        <!-- Imagen del producto con tamaño fijo -->
                        <img src="{{ asset('storage/' . $product->imagen) }}" class="card-img-top img-fixed" alt="{{ $product->nombre }}">

                        <div class="card-body text-center">
                            <!-- Nombre del producto -->
                            <h5 class="card-title">{{ $product->nombre }}</h5>

                            <!-- Descripción del producto (limitada a 100 caracteres) -->
                            <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($product->descripcion, 80) }}</p>

                            <!-- Precio del producto -->
                            <p class="card-text font-weight-bold">Precio: ${{ number_format($product->precio, 2) }}</p>

                            <!-- Botón para ver los detalles del producto -->
                            <a href="{{ route('productos.show', $product->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
</div>

<!-- Estilos CSS personalizados -->
<style>
    /* Fija el tamaño de las imágenes */
    .img-fixed {
        width: 100%;
        height: 180px; /* Ajusta el alto según prefieras */
        object-fit: cover;
        border-radius: 0.25rem 0.25rem 0 0; /* Redondea las esquinas superiores */
    }

    /* Estilo uniforme para las tarjetas de producto */
    .product-card {
        min-height: 350px; /* Define una altura mínima */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
    }

    /* Estilo del contenido de la tarjeta */
    .product-card .card-body {
        padding: 1rem;
    }

    /* Mejoras en el botón */
    .btn-primary {
        margin-top: 0.5rem;
        font-size: 0.875rem;
    }
</style>
@endsection

