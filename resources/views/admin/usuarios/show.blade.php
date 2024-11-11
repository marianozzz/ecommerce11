@extends('adminlte::page')

@section('title', 'Detalles del Usuario')

@section('content_header')
    <h1>Detalles del Usuario</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información del Usuario</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong>Nombre:</strong>
                    <p>{{ $usuario->nombre }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Apellido:</strong>
                    <p>{{ $usuario->apellido }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Email:</strong>
                    <p>{{ $usuario->email }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Rol:</strong>
                    <p>
                        @if($usuario->roles->isNotEmpty())
                            {{ $usuario->roles->pluck('name')->join(', ') }}
                        @else
                            Sin rol asignado
                        @endif
                    </p>
                </div>
                {{-- Agrega aquí más campos según tus necesidades --}}
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
@endsection
