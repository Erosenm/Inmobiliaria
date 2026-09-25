@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <div class="px-6 pt-6 pb-3">
            <h2 class="text-3xl font-black tracking-tight text-slate-800">Ingresos - Últimos 6 meses</h2>
        </div>

        <div class="px-4 pb-4">
            <canvas id="graficoIngresos" height="155"></canvas>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <x-card-kpi titulo="Ingresos en Caja Hoy" valor="{{ number_format($ingresosHoy, 0, ',', '.') }} Bs" icono="fa-cash-register" color="emerald" />
        <x-card-kpi titulo="Clientes Ingresados" valor="{{ $clientesIngresados }}" icono="fa-person-walking" color="blue" />
        <x-card-kpi titulo="Membresías por Vencer" valor="{{ $membresiasPorVencer }}" icono="fa-triangle-exclamation" color="amber" />
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800">Pagos de Hoy</h3>
        </div>

        @if ($pagosHoy->isEmpty())
            <p class="px-6 py-6 text-sm text-gray-400">Todavía no se registraron pagos hoy.</p>
        @else
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-400 uppercase text-xs">
                        <th class="px-6 py-3 font-semibold">Socio</th>
                        <th class="px-6 py-3 font-semibold">Método</th>
                        <th class="px-6 py-3 font-semibold">Hora</th>
                        <th class="px-6 py-3 font-semibold text-right">Monto</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($pagosHoy as $pago)
                        <tr>
                            <td class="px-6 py-3 font-medium text-gray-700">{{ $pago->suscripcion->usuario->name ?? '—' }}</td>
                            <td class="px-6 py-3 text-gray-500 capitalize">{{ $pago->metodo_pago }}</td>
                            <td class="px-6 py-3 text-gray-500">{{ $pago->pagado_el->format('H:i') }}</td>
                            <td class="px-6 py-3 text-right font-semibold text-gray-800">{{ number_format($pago->monto, 0, ',', '.') }} Bs</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@push('scripts')
<script>
    const ctxIngresos = document.getElementById('graficoIngresos');
    if (ctxIngresos) {
        new Chart(ctxIngresos, {
            type: 'line',
            data: {
                labels: {!! json_encode($mesesIngresos) !!},
                datasets: [{
                    label: 'Ingresos (Bs)',
                    data: {!! json_encode($valoresIngresos) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.10)',
                    fill: true,
                    tension: 0.35,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#3b82f6',
                    borderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 180,
                        ticks: {
                            stepSize: 20,
                            color: '#64748b',
                            font: { size: 12 }
                        },
                        grid: { color: '#e2e8f0' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#64748b', font: { size: 12 } }
                    }
                }
            }
        });
    }
</script>
@endpush
@endsection