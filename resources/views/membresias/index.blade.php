<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Encabezado --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Planes de Membresías</h2>
                        <p class="text-sm text-gray-500">Gestiona los planes disponibles para los socios del gimnasio.</p>
                    </div>
                    <a href="{{ route('membresias.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                        + Nueva Membresía
                    </a>
                </div>

                {{-- Mensaje de éxito --}}
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tabla de Membresías --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                                <th class="p-3">Nombre del Plan</th>
                                <th class="p-3">Precio</th>
                                <th class="p-3">Duración (Días)</th>
                                <th class="p-3">Descripción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse($membresias as $membresia)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-3 font-semibold text-gray-800">{{ $membresia->nombre }}</td>
                                    <td class="p-3 font-bold text-emerald-600">Bs. {{ number_format($membresia->precio, 2) }}</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-md font-medium text-xs">
                                            {{ $membresia->duracion_dias }} días
                                        </span>
                                    </td>
                                    <td class="p-3 text-gray-600">{{ $membresia->descripcion ?? 'Sin descripción' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-6 text-center text-gray-500">
                                        No hay planes registrados aún. Haz clic en <strong>"+ Nueva Membresía"</strong> para crear el primero.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>