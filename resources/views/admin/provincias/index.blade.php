@extends('adminlte::page')

@section('title', 'Listado de Provincias')

@section('content')
    <div class="container mt-5">
        <h1>Listado de Provincias</h1>
        
        <a href="{{ route('admin.provincias.create') }}" class="btn btn-primary mb-3">Agregar Provincia</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($provincias as $provincia)
                    <tr>
                        <td>{{ $provincia->id }}</td>
                        <td>{{ $provincia->nombre }}</td>
                        <td>
                            <a href="{{ route('admin.provincias.edit', $provincia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.provincias.destroy', $provincia->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
