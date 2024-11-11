@extends('adminlte::page')

@section('title', 'Panel de Administración')

@section('content_header')
    <h1>Dashboard de Administración</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Tarjeta: Total de Ventas -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalVentas ?? '0' }}</h3>
                        <p>Total de Ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('admin.ventas.index') }}" class="small-box-footer">
                        Ver Ventas <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tarjeta: Total de Compras -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalCompras ?? '0' }}</h3>
                        <p>Total de Compras</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <a href="{{ route('compras.index') }}" class="small-box-footer">
                        Ver Compras <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tarjeta: Usuarios Registrados -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalUsuarios ?? '0' }}</h3>
                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        Ver Usuarios <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tarjeta: Productos Disponibles -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalProductos ?? '0' }}</h3>
                        <p>Productos Disponibles</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <a href="{{ route('admin.productos.index') }}" class="small-box-footer">
                        Ver Productos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Área adicional para gráficos o tablas -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Resumen de Actividad Reciente</h3>
                    </div>
                    <div class="card-body">
                        <p>Aquí puedes incluir gráficos, tablas o cualquier otro contenido relevante para el panel de administración.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Panel de administración cargado'); </script>
@stop
