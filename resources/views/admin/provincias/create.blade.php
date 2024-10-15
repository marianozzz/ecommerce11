@extends('adminlte::page')

@section('title', 'Agregar Provincia')

@section('content')
    <div class="container mt-5">
        <h1>Agregar Nueva Provincia</h1>

        <form action="{{ route('admin.provincias.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Provincia</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
