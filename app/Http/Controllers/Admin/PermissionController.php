<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permisos.index', compact('permissions'));
    }

    public function create()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return $route->getName();
        })->filter()->sort()->toArray();
    
        return view('admin.permisos.create', compact('routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('permisos.index')->with('success', 'Permiso creado exitosamente.');
    }

    public function edit(Permission $permiso)
    {
        return view('admin.permisos.edit', compact('permiso'));
    }

    public function update(Request $request, Permission $permiso)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permiso->id,
        ]);

        $permiso->update(['name' => $request->name]);

        return redirect()->route('admin.permisos.index')->with('success', 'Permiso actualizado exitosamente.');
    }

    public function destroy(Permission $permiso)
    {
        $permiso->delete();

        return redirect()->route('admin.permisos.index')->with('success', 'Permiso eliminado exitosamente.');
    }
}
