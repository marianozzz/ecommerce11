<div>
  <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar Usuario
            </a>
            <input type="text" wire:model.live="search" class="form-control mt-4" placeholder="Buscar usuario">
        </div>

        @if($usuarios->count())
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            {{ $usuarios->links() }} <!-- Paginación si estás usando paginate() en el controlador -->
        </div>
          @else
          <strong>No hay coincidencia</strong>
          @endif
    </div>
</div>
