@extends('layouts.dashboard')

@section('content')
<div class="w-full max-w-5xl mx-auto space-y-5">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-card-kpi titulo="Ingresos Mes" valor="{{ number_format($ingresosMes, 0, ',', '.') }} Bs" icono="fa-wallet" color="blue" />
        <x-card-kpi titulo="Total Socios" valor="{{ number_format($totalSocios, 0, ',', '.') }}" icono="fa-users" color="emerald" />
        <x-card-kpi titulo="Membresías Activas" valor="{{ number_format($membresiasActivas, 0, ',', '.') }}" icono="fa-id-card" color="amber" />
        <x-card-kpi titulo="Asistencias Hoy" valor="{{ $asistenciasHoy }}" icono="fa-user-check" color="indigo" />
    </div>

    <div class="w-full bg-white p-4 sm:p-6 rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-3xl font-black tracking-tight text-slate-800">Ingresos - Últimos 6 meses</h3>
        </div>
        <div class="h-72 sm:h-80 lg:h-96">
            <canvas id="graficoIngresos" class="w-full h-full"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const ctxIngresos = document.getElementById('graficoIngresos');
    new Chart(ctxIngresos, {
        type: 'line',
        data: {
            labels: {!! json_encode($mesesIngresos) !!},
            datasets: [{
                label: 'Ingresos (Bs)',
                data: {!! json_encode($valoresIngresos) !!},
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.35,
                pointBackgroundColor: '#3b82f6',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                x: { grid: { display: false } }
            }
        }
    });
</script>
@endpush
@endsection