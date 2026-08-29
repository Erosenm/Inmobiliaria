<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Nueva Membresía</h2>

                <form action="{{ route('membresias.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre del Plan</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Precio (Bs.)</label>
                            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('precio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Duración (Días)</label>
                            <input type="number" name="duracion_dias" value="{{ old('duracion_dias', 30) }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('duracion_dias') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
                        <textarea name="descripcion" rows="3" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('membresias.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300">
                            Cancelar
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-indigo-700">
                            Guardar Membresía
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>