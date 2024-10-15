@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Perfil de Usuario</h1>
        <p>Bienvenido a tu perfil, {{ Auth::user()->name }}.</p>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Datos Personales</h5>

                @if($perfil)
                    <table class="table">
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $perfil->direccion ?? 'Sin completar' }}</td>
                        </tr>
                        <tr>
                            <th>Provincia:</th>
                            <td>{{ $perfil->provincia->nombre ?? 'Sin completar' }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad:</th>
                            <td>{{ $perfil->ciudad->nombre ?? 'Sin completar' }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('profile.edit',$perfil)}}" class="btn btn-primary">Editar Perfil</a>
                @else
                    <div class="alert alert-warning">
                        No has completado tu perfil. <a href="{{ route('profile.create') }}" class="btn btn-success">Completar Perfil</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
