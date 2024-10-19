@extends('adminlte::page')

@section('title', 'Registrar Venta')

@section('content_header')
    <h1>Registrar Nueva Venta</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('admin.ventas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" step="0.01" name="total" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar Venta</button>
        </form>
    </div>
@stop
