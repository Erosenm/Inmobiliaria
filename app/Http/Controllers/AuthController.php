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

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}