@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Pagos</h2>
        <p class="text-sm text-gray-500">Historial de pagos registrados en el gimnasio.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-400 uppercase text-xs bg-gray-50">
                    <th class="px-6 py-3 font-semibold">Socio</th>
                    <th class="px-6 py-3 font-semibold">Método</th>
                    <th class="px-6 py-3 font-semibold">Fecha</th>
                    <th class="px-6 py-3 font-semibold text-right">Monto</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($pagos as $pago)
                    <tr>
                        <td class="px-6 py-3 font-medium text-gray-700">{{ $pago->suscripcion->usuario->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-500 capitalize">{{ $pago->metodo_pago }}</td>
                        <td class="px-6 py-3 text-gray-500">{{ $pago->pagado_el->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-3 text-right font-semibold text-gray-800">{{ number_format($pago->monto, 0, ',', '.') }} Bs</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-6 text-center text-gray-400">Todavía no hay pagos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $pagos->links() }}
</div>
@endsection