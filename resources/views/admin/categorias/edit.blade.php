@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Categoría</div>

                <div class="card-body">
                    <!-- Formulario de edición de categoría -->
                    <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre de la categoría -->
                        <div class="form-group mb-3">
                            <label for="name">Nombre de la Categoría</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $categoria->name) }}" required>
                        </div>

                        <!-- Descripción de la categoría -->
                        <div class="form-group mb-3">
                            <label for="description">Descripción</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $categoria->description) }}</textarea>
                        </div>

                        <!-- Botones para guardar o cancelar -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
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
    <script> console.log('Hi!'); </script>
@stop
