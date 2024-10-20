@extends('adminlte::page')

@section('title', 'Detalle de Venta')

@section('content_header')
    <h1>Detalle de la Venta #{{ $venta->id }}</h1>
    <a href="{{ route('admin.ventas.index') }}" class="btn btn-secondary">Volver al Listado</a>
@stop

@section('content')
    <div class="container">
        <h3>Cliente: {{ $venta->user->name }}</h3>
        <h4>Total: ${{ number_format($venta->total, 2) }}</h4>
        <h5>Fecha: {{ $venta->fecha }}</h5>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta->detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>${{ number_format($detalle->precio, 2) }}</td>
                        <td>${{ number_format($detalle->precio * $detalle->cantidad, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
