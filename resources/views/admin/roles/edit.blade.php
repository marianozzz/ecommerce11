@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Regresar a la lista de roles</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nombre del Rol:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                </div>

                <h5><strong>Permisos:</strong></h5>
                <div class="form-group">
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input 
                                type="checkbox" 
                                name="permissions[]" 
                                value="{{ $permission->id }}" 
                                class="form-check-input" 
                                id="permission_{{ $permission->id }}"
                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                
                <button type="submit" class="btn btn-success">Actualizar Rol</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Role Edit Loaded'); </script>
@stop
