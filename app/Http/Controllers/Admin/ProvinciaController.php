<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provincias = Provincia::all();
        return view('admin.provincias.index', compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.provincias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Provincia::create($request->all());

        return redirect()->route('admin.provincias.index')->with('success', 'Provincia creada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provincia $provincia)
    {
        return view('admin.provincias.edit', compact('provincia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provincia $provincia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $provincia->update($request->all());

        return redirect()->route('admin.provincias.index')->with('success', 'Provincia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();

        return redirect()->route('admin.provincias.index')->with('success', 'Provincia eliminada correctamente.');
    }
}
