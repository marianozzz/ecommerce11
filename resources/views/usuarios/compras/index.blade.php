@extends('layouts.app')

@section('title', 'Historial de Compras')

@section('content')
<div class="container mt-5">
    <h1>Historial de Compras</h1>

    @if($compras->isEmpty())
        <p>No tienes compras en tu historial.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->fecha_compra }}</td>
                        <td>${{ number_format($compra->total, 2) }}</td>
                        <td><a href="{{ route('compras.show', $compra->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
