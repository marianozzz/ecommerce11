@extends('layouts.admin')

@section('title', 'Editar Provincia')

@section('content')
    <div class="container mt-5">
        <h1>Editar Provincia</h1>

        <form action="{{ route('admin.provincias.update', $provincia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Provincia</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $provincia->nombre }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
