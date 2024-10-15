@extends('adminlte::page')

@section('title', 'Editar Ciudad')

@section('content')
    <div class="container mt-5">
        <h1>Editar Ciudad</h1>

        <form action="{{ route('admin.ciudades.update', $ciudad->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Ciudad</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $ciudad->nombre }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="provincia_id" class="form-label">Provincia</label>
                <select name="provincia_id" id="provincia_id" class="form-control" required>
                    <option value="">Seleccione una Provincia</option>
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id }}" {{ $ciudad->provincia_id == $provincia->id ? 'selected' : '' }}>{{ $provincia->nombre }}</option>
                    @endforeach
                </select>
                @error('provincia_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
