<?php

namespace App\Http\Controllers;

use App\Models\Membresia;x
use Illuminate\Http\Request;

class MembresiasController extends Controller
{
    public function index()
    {
        $membresias = Membresia::where('gimnasio_id', auth()->user()->gimnasio_id)
            ->latest()
            ->get();

        return view('membresias.index', compact('membresias'));
    }

    public function create()
    {
        return view('membresias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Membresia::create([
            'gimnasio_id' => auth()->user()->gimnasio_id,
            'nombre'      => $request->nombre,
            'precio'      => $request->precio,
            'duracion'    => $request->duracion,
        ]);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía registrada correctamente.');
    }
}
