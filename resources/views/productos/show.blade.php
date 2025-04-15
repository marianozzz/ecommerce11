@extends('layouts.app')

@section('title', $product->nombre)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->nombre }}</h1>
            <p>{{ $product->descripcion }}</p>
            <h3>${{ number_format($product->precio, 2) }}</h3>
            <p><strong>Stock:</strong> {{ $product->stock }} unidades disponibles</p>
            
            <!-- Formulario para agregar el producto al carrito -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <select id="cantidad" name="cantidad" class="form-control">
                            @for ($i = 1; $i <= $product->stock; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            
                </div>
                <button type="submit" class="btn btn-success mt-4">Agregar al carrito</button>
            </form>

            <!-- Botón para volver a la tienda -->
            <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver a la tienda</a>
        </div>
    </div>
</div>
@endsection

