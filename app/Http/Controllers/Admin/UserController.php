<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // Método para mostrar la lista de usuarios
    public function index()
    {
        $usuarios = User::paginate(10); // Paginación para una mejor visualización
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all(); // O bien, obtén solo los nombres si es necesario
        return view('admin.usuarios.create', compact('roles'));
    }

    // Método para almacenar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado con éxito.');
    }

    // Método para mostrar los detalles de un usuario
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    // Método para mostrar el formulario de edición de usuario
    public function edit(User $usuario)
    {
        $roles = Role::all();
       // $usuario = User::findOrFail($id);

      
        return view('admin.usuarios.edit', compact('usuario','roles'));
    }

    // Método para actualizar la información de un usuario
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);

        return redirect()->route('admin.usuarios.edit',$usuario)->with('info','success', 'Usuario actualizado con éxito.');
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
