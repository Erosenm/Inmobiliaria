<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('gimnasio_id', auth()->user()->gimnasio_id)
            ->latest()
            ->get();

        return view('usuarios.index', compact('usuarios'));
    }

    
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|min:6',
            'rol'      => 'required|in:administrador,recepcionista,socio',
            'telefono' => 'nullable|string|max:20',
        ]);

        User::create([
            'gimnasio_id' => auth()->user()->gimnasio_id, 
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'rol'         => $request->rol,
            'telefono'    => $request->telefono,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario registrado correctamente.');
    }
}