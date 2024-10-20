@extends('adminlte::page')

@section('title', 'Administracion de Ventas')

@section('content_header')
    <h1>Listado de Ventas</h1>
    <a href="{{ route('admin.ventas.create') }}" class="btn btn-primary">Registrar Nueva Venta</a>
@stop

@section('content')
    <div class="container">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th># Venta</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->user->name }}</td>
                <td>${{ number_format($venta->total, 2) }}</td>
                <td>{{ $venta->fecha }}</td>
                <td>
                    <a href="{{ route('admin.ventas.show', $venta->id) }}" class="btn btn-info btn-sm">Ver Detalle</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
@stop
