@extends('adminlte::page')

@section('title', 'Listado de Productos')

@section('content_header')
    <h1>Listado de Productos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">Crear Producto</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($producto->descripcion, 50) }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="50">
                                @else
                                    No Imagen
                                @endif
                            </td>
                            <td>{{ $producto->categoria->nombre }}</td>
                            <td>
                                <!-- Botón para ver el producto -->
                                <a href="{{ route('admin.productos.show', $producto) }}" class="btn btn-sm btn-info">Ver</a>
                                
                                <!-- Botón para editar el producto -->
                                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>

                                <!-- Formulario para eliminar el producto -->
                                <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
@stop

