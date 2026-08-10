<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gimnasio;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listar usuarios del gimnasio
    public function index()
    {
        $usuarios = User::with('gimnasio')->latest()->get();
        return view('usuarios.index', compact('usuarios'));
    }

    // Formulario para crear un nuevo usuario
    public function create()
    {
        $gimnasios = Gimnasio::where('estado', 'activo')->get();
        return view('usuarios.create', compact('gimnasios'));
    }

    // Guardar usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'gimnasio_id' => 'required|exists:gimnasios,id',
            'name'        => 'required|string|max:100',
            'email'       => 'required|email|max:150',
            'password'    => 'required|min:6',
            'rol'         => 'required|in:administrador,recepcionista,socio',
            'telefono'    => 'nullable|string|max:20',
        ]);

        User::create([
            'gimnasio_id' => $request->gimnasio_id,
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'rol'         => $request->rol,
            'telefono'    => $request->telefono,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente.');
    }
}