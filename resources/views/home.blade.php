@extends('layouts.app') <!-- Extiende el layout base de Laravel -->

@section('title', 'Inicio')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Bienvenido a Nuestra Tienda</h1>
    
    <!-- Mostrar botón de inicio de sesión o perfil según el estado de autenticación -->
  

    <!-- Mostrar productos destacados si existen -->
    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            No hay productos disponibles en este momento.
        </div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-2">
                    <div class="card mb-2">
                        <!-- Imagen del producto -->
                        <img src="{{ asset('storage/' . $product->imagen) }}" class="card-img-top" alt="{{ $product->nombre }}">

                        <div class="card-body">
                            <!-- Nombre del producto -->
                            <h5 class="card-title">{{ $product->nombre }}</h5>

                            <!-- Descripción del producto (limitada a 100 caracteres) -->
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($product->descripcion, 100) }}</p>

                            <!-- Precio del producto -->
                            <p class="card-text"><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>

                            <!-- Botón para ver los detalles del producto -->
                            <a href="{{ route('productos.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
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
@endsection
