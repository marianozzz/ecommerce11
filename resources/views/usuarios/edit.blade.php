@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Perfil</h1>

        <!-- Mensaje de éxito si el perfil se actualiza -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ Auth::user()->perfil->direccion ?? '' }}">
            </div>

            <div class="form-group mt-3">
                <label for="provincia">Provincia</label>
                <select name="provincia_id" id="provincia" class="form-control">
                    <option value="">Selecciona una provincia</option>
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id }}" {{ Auth::user()->perfil->provincia_id == $provincia->id ? 'selected' : '' }}>
                            {{ $provincia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="ciudad">Ciudad</label>
                <select name="ciudad_id" id="ciudad" class="form-control">
                    <option value="">Selecciona una ciudad</option>
                    <!-- Aquí se llenarán las ciudades con AJAX -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Actualizar Perfil</button>
        </form>
    </div>

    <script>
        document.getElementById('provincia').addEventListener('change', function() {
            var provinciaId = this.value;
            var ciudadSelect = document.getElementById('ciudad');

            // Limpiar opciones del select de ciudad
            ciudadSelect.innerHTML = '<option value="">Selecciona una ciudad</option>';

            // Realizar petición AJAX para obtener las ciudades de la provincia seleccionada
            if(provinciaId) {
                fetch(`/provincias/${provinciaId}/ciudades`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(function(ciudad) {
                            var option = document.createElement('option');
                            option.value = ciudad.id;
                            option.text = ciudad.nombre;
                            ciudadSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
@endsection
