<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gimnasio Pretorianos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Crear Cuenta</h2>
        <p class="text-sm text-center text-gray-500 mb-6">Únete a Gimnasio Pretorianos</p>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 text-sm rounded">
                <ul class="list-disc pl-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" name="name" value="{{ old('name') }}" required 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" required 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <button type="submit" 
                    class="w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700 transition">
                Registrarse
            </button>
        </form>

        <div class="mt-6 text-center border-t pt-4">
            <p class="text-sm text-gray-600">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">
                    Inicia sesión
                </a>
            </p>
        </div>
    </div>

</body>
</html>