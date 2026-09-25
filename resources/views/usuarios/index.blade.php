@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Usuarios</h2>
            <p class="text-sm text-gray-500">Empleados y socios registrados en tu gimnasio.</p>
        </div>
        <a href="{{ route('usuarios.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
            <i class="fa-solid fa-plus"></i> Nuevo Usuario
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-400 uppercase text-xs bg-gray-50">
                    <th class="px-6 py-3 font-semibold">Nombre</th>
                    <th class="px-6 py-3 font-semibold">Correo</th>
                    <th class="px-6 py-3 font-semibold">Rol</th>
                    <th class="px-6 py-3 font-semibold">Teléfono</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td class="px-6 py-3 font-medium text-gray-700">{{ $usuario->name }}</td>
                        <td class="px-6 py-3 text-gray-500">{{ $usuario->email }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-md font-medium text-xs capitalize">{{ $usuario->rol }}</span>
                        </td>
                        <td class="px-6 py-3 text-gray-500">{{ $usuario->telefono ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-6 text-center text-gray-400">No hay usuarios registrados todavía.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection