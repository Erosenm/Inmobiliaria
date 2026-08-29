<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Gimnasio Pretorianos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-amber-500 text-black p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-xl font-bold">Gimnasio Pretorianos</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-black text-white hover:bg-gray-800 px-4 py-2 rounded text-sm font-semibold transition">
                Cerrar Sesión
            </button>
        </form>
    </nav>

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Bienvenido, {{ auth()->user()->name }}</h2>
        <p class="text-gray-600 mb-6">Tu espacio personal de entrenamiento.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-amber-50 border-l-4 border-amber-500 rounded">
                <p class="text-xs font-semibold text-amber-600 uppercase">Estado de Cuenta</p>
                <p class="text-lg font-bold text-gray-800">Cliente Activo</p>
            </div>
            <div class="p-4 bg-gray-50 border-l-4 border-gray-500 rounded">
                <p class="text-xs font-semibold text-gray-600 uppercase">Rol</p>
                <p class="text-lg font-bold text-gray-800">Cliente</p>
            </div>
        </div>
    </div>
</body>
</html>