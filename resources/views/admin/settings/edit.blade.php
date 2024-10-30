@extends('adminlte::page')

@section('title', 'Configuración del Sitio')

@section('content_header')
    <h1>Configuración del Sitio</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('settings.update', 1) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nombre de la Tienda</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $settings['name']) }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $settings['address']) }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $settings['phone']) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Actualizar Configuración</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Estilos personalizados para mejorar la apariencia */
    </style>
@stop

@section('js')
    <script>
        console.log('Configuración del sitio lista!');
    </script>
@stop
