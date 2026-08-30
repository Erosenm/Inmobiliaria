<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar formulario de Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Mostrar formulario de Registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return match ($user->rol) {
                'super_admin'            => redirect()->route('admin.dashboard'),
                'admin', 'recepcionista' => redirect()->route('panel.gestion'),
                default                  => redirect()->route('cliente.dashboard'),
            };
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Procesar el registro
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['gimnasio_id'] = 1;
        $data['rol'] = 'cliente';

        $user = \App\Models\User::create($data);

        Auth::login($user);

        return redirect()->route('cliente.dashboard');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}