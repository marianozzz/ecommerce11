@extends('adminlte::page')

@section('title', 'Listado de Categorías')

@section('content_header')
    <h1>Listado de Categorías</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('categorias.create') }}" class="btn btn-success mb-3">Crear Nueva Categoría</a>
                @if($categorias->isEmpty())
                    <div class="alert alert-warning text-center">No hay categorías disponibles.</div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $categorias->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hello!'); </script>
@stop
