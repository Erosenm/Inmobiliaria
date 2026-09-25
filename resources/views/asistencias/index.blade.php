@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Asistencias</h2>
        <p class="text-sm text-gray-500">Registro de entradas y salidas de los socios.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-400 uppercase text-xs bg-gray-50">
                    <th class="px-6 py-3 font-semibold">Socio</th>
                    <th class="px-6 py-3 font-semibold">Fecha</th>
                    <th class="px-6 py-3 font-semibold">Entrada</th>
                    <th class="px-6 py-3 font-semibold">Salida</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($asistencias as $asistencia)
                    <tr>
                        <td class="px-6 py-3 font-medium text-gray-700">{{ $asistencia->usuario->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-500">{{ $asistencia->fecha->format('d/m/Y') }}</td>
                        <td class="px-6 py-3 text-gray-500">{{ $asistencia->hora_entrada }}</td>
                        <td class="px-6 py-3 text-gray-500">{{ $asistencia->hora_salida ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-6 text-center text-gray-400">Todavía no hay asistencias registradas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $asistencias->links() }}
</div>
@endsection