<!-- resources/views/admin/usuarios/edit.blade.php -->

@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
@if(session('info'))

<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>

@endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modificar información del usuario</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" 
                           value="{{ old('nombre', $usuario->nombre) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" 
                           value="{{ old('email', $usuario->email) }}" required>
                </div>

                <div class="form-group">
                    <h2 class="h5">Listado de Roles</h2>
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input 
                                    type="checkbox" 
                                    name="roles[]" 
                                    value="{{ $role->id }}" 
                                    class="form-check-input"
                                    id="role_{{ $role->id }}"
                                    {{ $usuario->hasRole($role->name) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
