<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepción / Gestión - Gimnasio Pretorianos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-700 text-white p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-xl font-bold">Panel de Recepción y Gestión</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-semibold transition">
                Cerrar Sesión
            </button>
        </form>
    </nav>

    <div class="max-w-7xl mx-auto mt-8 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Hola, {{ auth()->user()->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-blue-600">
                <h3 class="font-bold text-gray-700 text-lg">Registro de Clientes</h3>
                <p class="text-sm text-gray-500 mt-1">Alta y consulta de clientes activos.</p>
                <a href="{{ route('usuarios.index') }}" class="inline-block mt-4 text-blue-600 font-semibold text-sm hover:underline">Ver Clientes &rarr;</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-emerald-600">
                <h3 class="font-bold text-gray-700 text-lg">Cobro de Membresías</h3>
                <p class="text-sm text-gray-500 mt-1">Asignar y renovar planes de entrenamiento.</p>
                <a href="{{ route('membresias.index') }}" class="inline-block mt-4 text-emerald-600 font-semibold text-sm hover:underline">Ver Planes &rarr;</a>
            </div>
        </div>
    </div>
</body>
</html>