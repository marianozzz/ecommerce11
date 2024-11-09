@extends('adminlte::page') <!-- Usa la extensión de AdminLTE para mantener la coherencia de estilo -->

@section('title', 'Reportes')

@section('content_header')
    <h1 class="text-center mb-4">Panel de Reportes</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!-- Tarjeta de Reporte de Ventas -->
        <div class="col-md-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-dollar-sign fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Reporte de Ventas</h5>
                        <p class="card-text text-muted">Consulta el reporte de ventas detallado.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta de Reporte de Clientes -->
        <div class="col-md-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Reporte de Clientes</h5>
                        <p class="card-text text-muted">Revisa estadísticas y detalles de clientes.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta de Reporte de Stock -->
        <div class="col-md-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-boxes fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Reporte de Stock</h5>
                        <p class="card-text text-muted">Visualiza el inventario y productos disponibles.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection

@section('css')
<style>
    .card:hover {
        transform: scale(1.05);
        transition: transform 0.2s;
    }
</style>
@endsection
