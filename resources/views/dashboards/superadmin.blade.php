<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin - Gimnasio Pretorianos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-slate-900 text-white p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-xl font-bold">Panel Super Administrador</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-semibold transition">
                Cerrar Sesión
            </button>
        </form>
    </nav>

    <div class="max-w-7xl mx-auto mt-8 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Bienvenido, {{ auth()->user()->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-purple-600">
                <h3 class="font-bold text-gray-700 text-lg">Gestión de Usuarios</h3>
                <p class="text-sm text-gray-500 mt-1">Administra el personal y clientes.</p>
                <a href="{{ route('usuarios.index') }}" class="inline-block mt-4 text-purple-600 font-semibold text-sm hover:underline">Ir a Usuarios &rarr;</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-indigo-600">
                <h3 class="font-bold text-gray-700 text-lg">Planes y Membresías</h3>
                <p class="text-sm text-gray-500 mt-1">Configura los precios y duraciones.</p>
                <a href="{{ route('membresias.index') }}" class="inline-block mt-4 text-indigo-600 font-semibold text-sm hover:underline">Ir a Membresías &rarr;</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-slate-600">
                <h3 class="font-bold text-gray-700 text-lg">Ajustes del Sistema</h3>
                <p class="text-sm text-gray-500 mt-1">Configuración global del gimnasio.</p>
                <span class="inline-block mt-4 text-gray-400 font-semibold text-sm">Control Total</span>
            </div>
        </div>
    </div>
</body>
</html>