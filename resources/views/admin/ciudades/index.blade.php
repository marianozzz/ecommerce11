@extends('adminlte::page')

@section('title', 'Listado de Ciudades')

@section('content')
    <div class="container mt-5">
        <h1>Listado de Ciudades</h1>
        
        <a href="{{ route('admin.ciudades.create') }}" class="btn btn-primary mb-3">Agregar Ciudad</a>

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
                    <th>Provincia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ciudades as $ciudad)
                    <tr>
                        <td>{{ $ciudad->id }}</td>
                        <td>{{ $ciudad->nombre }}</td>
                        <td>{{ $ciudad->provincia->nombre }}</td>
                        <td>
                            <a href="{{ route('admin.ciudades.edit', $ciudad->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.ciudades.destroy', $ciudad->id) }}" method="POST" style="display:inline-block;">
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
