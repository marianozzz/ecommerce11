@extends('adminlte::page')

@section('title', 'Configuración del Sitio')

@section('content_header')
    <h1>Configuración del Sitio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Configuraciones del Sitio</h3>
            <div class="card-tools">
                <a href="{{ route('settings.edit', 1) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Editar Configuraciones
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Configuración</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre de la Tienda</td>
                        <td>{{ config('app.store.name') }}</td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td>{{ config('app.store.address') }}</td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{ config('app.store.phone') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Estilos personalizados si es necesario */
    </style>
@stop

@section('js')
    <script> console.log('Configuración del sitio cargada'); </script>
@stop
