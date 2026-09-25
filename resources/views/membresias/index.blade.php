@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Planes de Membresías</h2>
            <p class="text-sm text-gray-500">Gestiona los planes disponibles para los socios del gimnasio.</p>
        </div>
        <a href="{{ route('membresias.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
            <i class="fa-solid fa-plus"></i> Nueva Membresía
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded text-sm">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-400 uppercase text-xs bg-gray-50">
                    <th class="px-6 py-3 font-semibold">Nombre del Plan</th>
                    <th class="px-6 py-3 font-semibold">Precio</th>
                    <th class="px-6 py-3 font-semibold">Duración</th>
                    <th class="px-6 py-3 font-semibold">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($membresias as $membresia)
                    <tr>
                        <td class="px-6 py-3 font-semibold text-gray-800">{{ $membresia->nombre }}</td>
                        <td class="px-6 py-3 font-bold text-emerald-600">Bs. {{ number_format($membresia->precio, 2) }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-md font-medium text-xs">{{ $membresia->duracion_dias }} días</span></td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-md font-medium text-xs {{ $membresia->estado === 'activa' ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">{{ ucfirst($membresia->estado) }}</span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-6 text-center text-gray-400">No hay planes registrados aún. Haz clic en <strong>"Nueva Membresía"</strong> para crear el primero.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection