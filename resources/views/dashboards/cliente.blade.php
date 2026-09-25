@extends('layouts.dashboard')
@section('content')
<div class="space-y-6">
    <h2 class="text-xl font-bold text-gray-800">Mi Cuenta</h2>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-1">Bienvenido, {{ auth()->user()->name }}</h3>
        <p class="text-gray-500 text-sm mb-6">Tu espacio personal de entrenamiento.</p>

        @if ($suscripcionActiva)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded">
                    <p class="text-xs font-semibold text-emerald-600 uppercase">Estado</p>
                    <p class="text-lg font-bold text-gray-800">Cliente Activo</p>
                </div>
                <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                    <p class="text-xs font-semibold text-blue-600 uppercase">Plan</p>
                    <p class="text-lg font-bold text-gray-800">{{ $suscripcionActiva->membresia->nombre }}</p>
                </div>
                <div class="p-4 bg-amber-50 border-l-4 border-amber-500 rounded">
                    <p class="text-xs font-semibold text-amber-600 uppercase">Vence el</p>
                    <p class="text-lg font-bold text-gray-800">{{ $suscripcionActiva->fecha_fin->format('d/m/Y') }}</p>
                </div>
            </div>
        @else
            <div class="p-4 bg-red-50 border-l-4 border-red-500 rounded">
                <p class="text-sm font-semibold text-red-600">No tienes una membresía activa en este momento.</p>
            </div>
        @endif
    </div>
</div>
@endsection