<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Provincia;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciudades = Ciudad::with('provincia')->get(); // Obtenemos las ciudades con su provincia
        return view('admin.ciudades.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provincias = Provincia::all(); // Obtenemos todas las provincias para el select
        return view('admin.ciudades.create', compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'provincia_id' => 'required|exists:provincias,id', // Validamos que la provincia exista
        ]);

        Ciudad::create($request->all());

        return redirect()->route('admin.ciudades.index')->with('success', 'Ciudad creada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ciudad $ciudad)
    {
        $provincias = Provincia::all(); // Obtenemos las provincias para el select
        return view('admin.ciudades.edit', compact('ciudad', 'provincias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'provincia_id' => 'required|exists:provincias,id',
        ]);

        $ciudad->update($request->all());

        return redirect()->route('admin.ciudades.index')->with('success', 'Ciudad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();

        return redirect()->route('admin.ciudades.index')->with('success', 'Ciudad eliminada correctamente.');
    }
}
