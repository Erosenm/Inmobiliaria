<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function index()
    {
        abort_unless(in_array(Auth::user()->rol, ['admin', 'recepcionista', 'super_admin']), 403);

        $pagos = Pago::with('suscripcion.usuario')
            ->where('gimnasio_id', Auth::user()->gimnasio_id)
            ->latest('pagado_el')
            ->paginate(15);

        return view('pagos.index', compact('pagos'));
    }
}