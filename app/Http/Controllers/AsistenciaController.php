<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    public function index()
    {
        abort_unless(in_array(Auth::user()->rol, ['admin', 'recepcionista', 'super_admin']), 403);

        $asistencias = Asistencia::with('usuario')
            ->where('gimnasio_id', Auth::user()->gimnasio_id)
            ->latest('fecha')
            ->paginate(15);

        return view('asistencias.index', compact('asistencias'));
    }
}