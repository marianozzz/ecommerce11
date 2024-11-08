@extends('adminlte::page')

@section('title', 'Crear Permiso')

@section('content_header')
    <h1>Crear Nuevo Permiso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Muestra mensajes de validación si los hay -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('permisos.store') }}" method="POST">
                @csrf
                
                <!-- Nombre del Permiso -->
                <div class="form-group">
                    <label for="name">Nombre del Permiso</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre del permiso" required>
                </div>

                <!-- Selección de Ruta -->
                <div class="form-group">
                    <label for="route">Seleccionar Ruta</label>
                    <select name="route" id="route" class="form-control">
                        <option value="">-- Seleccione una ruta --</option>
                        @foreach($routes as $route)
                            <option value="{{ $route }}">{{ $route }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón para enviar el formulario -->
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Crear Permiso</button>
                    <a href="{{ route('permisos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Página de creación de permisos cargada');
    </script>
@stop
