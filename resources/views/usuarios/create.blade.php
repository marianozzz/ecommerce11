@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Completar Perfil</h1>

        <form action="{{ route('profile.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="provincia_id">Provincia</label>
                <select class="form-control" id="provincia_id" name="provincia_id" required>
                    <option value="">Seleccione una provincia</option>
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ciudad_id">Ciudad</label>
                <select class="form-control" id="ciudad_id" name="ciudad_id" required>
                    <option value="">Seleccione una ciudad</option>
                    <!-- Las ciudades se llenarán mediante JavaScript al seleccionar la provincia -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar Perfil</button>
        </form>
    </div>

    <script>
    document.getElementById('provincia_id').addEventListener('change', function() {
    let provinciaId = this.value;
    if (provinciaId) {
        fetch(`/ciudades/${provinciaId}`)
            .then(response => response.json())
            .then(data => {
                let ciudadesSelect = document.getElementById('ciudad_id');
                ciudadesSelect.innerHTML = ''; // Limpiar el select antes de agregar nuevas ciudades

                // Iterar directamente sobre el array de ciudades devuelto
                data.forEach(ciudad => {
                    let option = document.createElement('option');
                    option.value = ciudad.id;
                    option.text = ciudad.nombre;
                    ciudadesSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error al obtener las ciudades:', error));
    }
});


    </script>
@endsection
