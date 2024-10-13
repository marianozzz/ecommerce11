@extends('adminlte::page')

@section('title', 'Detalles del Producto')

@section('content_header')
    <h1>Detalles del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $producto->nombre }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h4>Descripción</h4>
                    <p>{{ $producto->descripcion }}</p>
                    <h4>Precio</h4>
                    <p>${{ number_format($producto->precio, 2) }}</p>
                    <h4>Stock</h4>
                    <p>{{ $producto->stock }} unidades disponibles</p>
                    <h4>Categoría</h4>
                    <p>{{ $producto->categoria->nombre }}</p>
                    <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@stop
