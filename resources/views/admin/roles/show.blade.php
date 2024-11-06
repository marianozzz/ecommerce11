@extends('adminlte::page')

@section('title', 'Detalles del Rol')

@section('content_header')
    <h1>Detalles del Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Regresar a la lista de roles</a>
        </div>
        <div class="card-body">
            <h5><strong>Nombre del Rol:</strong> {{ $role->name }}</h5>
            
            <h5><strong>Permisos Asociados:</strong></h5>
            @if ($role->permissions->isEmpty())
                <p>Este rol no tiene permisos asociados.</p>
            @else
                <ul class="list-group">
                    @foreach ($role->permissions as $permission)
                        <li class="list-group-item">{{ $permission->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Rol
            </a>
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este rol?');">
                    <i class="fas fa-trash"></i> Eliminar Rol
                </button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Role Show Loaded'); </script>
@stop
