<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Pago;
use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private const MESES_ES = [
        1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun',
        7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic',
    ];

    public function administrador()
    {
        abort_unless(Auth::user()->rol === 'super_admin', 403);

        $gimnasioId = Auth::user()->gimnasio_id;

        $ingresosMes = Pago::where('gimnasio_id', $gimnasioId)
            ->whereMonth('pagado_el', now()->month)
            ->whereYear('pagado_el', now()->year)
            ->sum('monto');

        $totalSocios = User::where('gimnasio_id', $gimnasioId)
            ->where('rol', 'cliente')
            ->count();

        $membresiasActivas = Suscripcion::where('gimnasio_id', $gimnasioId)
            ->where('estado', 'activa')
            ->count();

        $asistenciasHoy = Asistencia::where('gimnasio_id', $gimnasioId)
            ->whereDate('fecha', today())
            ->count();

        $mesesIngresos = [];
        $valoresIngresos = [];

        for ($i = 5; $i >= 0; $i--) {
            $fecha = now()->subMonths($i);
            $mesesIngresos[] = self::MESES_ES[(int) $fecha->format('n')];
            $valoresIngresos[] = (float) Pago::where('gimnasio_id', $gimnasioId)
                ->whereMonth('pagado_el', $fecha->month)
                ->whereYear('pagado_el', $fecha->year)
                ->sum('monto');
        }

        return view('dashboards.administrador', compact(
            'ingresosMes', 'totalSocios', 'membresiasActivas', 'asistenciasHoy',
            'mesesIngresos', 'valoresIngresos'
        ));
    }

    public function recepcionista()
    {
        abort_unless(in_array(Auth::user()->rol, ['admin', 'recepcionista', 'super_admin']), 403);

        $gimnasioId = Auth::user()->gimnasio_id;

        $ingresosHoy = Pago::where('gimnasio_id', $gimnasioId)
            ->whereDate('pagado_el', today())
            ->sum('monto');

        $clientesIngresados = Asistencia::where('gimnasio_id', $gimnasioId)
            ->whereDate('fecha', today())
            ->count();

        $membresiasPorVencer = Suscripcion::where('gimnasio_id', $gimnasioId)
            ->where('estado', 'activa')
            ->whereBetween('fecha_fin', [today(), today()->addDays(7)])
            ->count();

        $pagosHoy = Pago::with('suscripcion.usuario')
            ->where('gimnasio_id', $gimnasioId)
            ->whereDate('pagado_el', today())
            ->latest('pagado_el')
            ->take(6)
            ->get();

        $mesesIngresos = [];
        $valoresIngresos = [];

        for ($i = 5; $i >= 0; $i--) {
            $fecha = now()->subMonths($i);
            $mesesIngresos[] = self::MESES_ES[(int) $fecha->format('n')];
            $valoresIngresos[] = (float) Pago::where('gimnasio_id', $gimnasioId)
                ->whereMonth('pagado_el', $fecha->month)
                ->whereYear('pagado_el', $fecha->year)
                ->sum('monto');
        }

        return view('dashboards.recepcionista', compact(
            'ingresosHoy', 'clientesIngresados', 'membresiasPorVencer', 'pagosHoy',
            'mesesIngresos', 'valoresIngresos'
        ));
    }

    public function cliente()
    {
        $user = Auth::user();

        $suscripcionActiva = Suscripcion::with('membresia')
            ->where('user_id', $user->id)
            ->where('estado', 'activa')
            ->latest('fecha_fin')
            ->first();

        return view('dashboards.cliente', compact('suscripcionActiva'));
    }
}