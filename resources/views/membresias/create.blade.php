@extends('layouts.dashboard')

@section('content')
<div class="max-w-xl space-y-6">
    <h2 class="text-xl font-bold text-gray-800">Crear Nueva Membresía</h2>

    <form action="{{ route('membresias.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Plan</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Precio (Bs.)</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('precio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Duración (Días)</label>
                <input type="number" name="duracion_dias" value="{{ old('duracion_dias', 30) }}" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('duracion_dias') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('membresias.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-200">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700">Guardar Membresía</button>
        </div>
    </form>
</div>
@endsection