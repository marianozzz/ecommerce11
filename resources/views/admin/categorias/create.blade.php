@extends('adminlte::page')

@section('title', 'Crear Categoría')

@section('content_header')
    <h1>Crear Categoría</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Categoría</h3>
                </div>
                <div class="card-body">
                    <!-- Formulario de creación -->
                    <form action="{{ route('admin.categorias.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de la Categoría</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                        </div>

                        <!-- Campo para la descripción de la categoría -->
                        <div class="form-group mt-3">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Crear Categoría</button>
                            <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
