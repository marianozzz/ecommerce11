@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Carrito de Compras</h1>

        <!-- Mostrar mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if(session('cart'))
                @php
                    $subtotal = 0;
                @endphp

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $detalle)
                            @php
                                $totalProducto = $detalle['precio'] * $detalle['cantidad'];
                                $subtotal += $totalProducto;
                            @endphp
                            <tr>
                                <td>{{ $detalle['id'] }}</td>
                                <td><img src="{{ asset('storage/' . $detalle['imagen']) }}" width="50"></td>
                                <td>{{ $detalle['nombre'] }}</td>
                                <td>{{ $detalle['cantidad'] }}</td>
                                <td>${{ number_format($detalle['precio'], 2) }}</td>
                                <td>${{ number_format($totalProducto, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Quitar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-4 offset-md-8">
                        <table class="table">
                            <tr>
                                <th>Subtotal:</th>
                                <td>${{ number_format($subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><strong>${{ number_format($subtotal, 2) }}</strong></td>
                            </tr>
                        </table>
                        <form action="{{ route('compras.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                        </form>
                    </div>
                </div>

            @else
                <div class="alert alert-warning text-center">
                    El carrito está vacío.
                </div>
            @endif
        @else
            <div class="alert alert-warning text-center">
                Debes iniciar sesión para ver tu carrito.
                <a href="{{ route('login') }}" class="btn btn-primary mt-2">Iniciar Sesión</a>
            </div>
        @endauth
    </div>
@endsection
