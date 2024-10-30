<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraController extends Controller
{
        public function index()
    {
        // Obtiene las compras del usuario autenticado
        $compras = auth()->user()->compras()->orderBy('fecha_compra', 'desc')->get();

        return view('compras.index', compact('compras'));
    }

}
