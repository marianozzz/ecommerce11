<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Provincia;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Muestra el perfil del usuario.
     */
    public function index()
    {
        // Verifica si el usuario tiene un perfil
        $perfil = Auth::user()->perfil;
    
        return view('usuarios.index', compact('perfil'));
    }
     // Almacenar un nuevo perfil
     public function store(Request $request)
     {
        
         // Validar los datos
         $request->validate([
             'direccion' => 'required|string|max:255',
             'provincia_id' => 'required|exists:provincias,id',
             'ciudad_id' => 'required|exists:ciudades,id',
         ]);
 
         // Crear el perfil asociado al usuario autenticado
         Perfil::create([
             'user_id' => Auth::id(),
             'direccion' => $request->direccion,
             'provincia_id' => $request->provincia_id,
             'ciudad_id' => $request->ciudad_id,
         ]);
 
         // Redirigir a la vista del perfil con un mensaje de éxito
         return redirect()->route('profile.index')->with('success', 'Perfil creado correctamente.');
     }
    public function create()
        {
            // Obtiene todas las provincias de la base de datos
            $provincias = Provincia::all();

            return view('usuarios.create', compact('provincias'));
        }
    
    
    /**
     * Muestra el formulario para editar el perfil del usuario.
     */
    public function edit()
    {
        $perfil = Auth::user()->perfil;
        $provincias = Provincia::all(); // Cargar todas las provincias

        // Redirigir a la vista de edición
        return view('usuarios.edit', compact('perfil', 'provincias'));
    }

    /**
     * Actualiza el perfil del usuario.
     */
    public function update(Request $request)
    {
        $request->validate([
            'direccion' => 'nullable|string|max:255',
            'provincia_id' => 'nullable|exists:provincias,id',
            'ciudad_id' => 'nullable|exists:ciudades,id',
        ]);

        $perfil = Auth::user()->perfil;
        $perfil->update([
            'direccion' => $request->direccion,
            'provincia_id' => $request->provincia_id,
            'ciudad_id' => $request->ciudad_id,
        ]);

        // Redirigir después de la actualización
        return redirect()->route('profile.index')->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Carga las ciudades en función de la provincia seleccionada (Ajax).
     */
    public function getCiudades($provincia_id)
    {
        $ciudades = Ciudad::where('provincia_id', $provincia_id)->get();
        return response()->json($ciudades);
    }
}
