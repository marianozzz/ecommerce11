@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Gestión de Permisos</h1>
@stop

@section('content')
    <a href="{{ route('permisos.create') }}" class="btn btn-primary mb-3">Nuevo Permiso</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permiso)
                <tr>
                    <td>{{ $permiso->id }}</td>
                    <td>{{ $permiso->name }}</td>
                    <td>
                        <a href="{{ route('permisos.edit', $permiso) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('permisos.destroy', $permiso) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
