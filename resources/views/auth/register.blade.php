<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gimnasio Pretorianos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        premium: {
                            gold: '#f5c518',
                            goldDark: '#d4af37',
                            black: '#0b0b0b',
                            panel: '#171717',
                            soft: '#1f1f1f'
                        }
                    },
                    boxShadow: {
                        premium: '0 0 0 1px rgba(245, 197, 24, 0.18), 0 18px 40px rgba(0, 0, 0, 0.55)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0b0b0b;
            background-image:
                linear-gradient(rgba(245, 197, 24, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(245, 197, 24, 0.08) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        .premium-panel {
            background: linear-gradient(180deg, rgba(31, 31, 31, 0.96), rgba(18, 18, 18, 0.98));
            border: 1px solid rgba(245, 197, 24, 0.25);
            box-shadow: 0 0 0 1px rgba(245, 197, 24, 0.08), 0 20px 50px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(12px);
        }

        .premium-input {
            background: rgba(8, 8, 8, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .premium-input:focus {
            border-color: rgba(245, 197, 24, 0.9);
            box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.12);
            outline: none;
        }
    </style>
</head>
<body class="relative min-h-screen flex items-center justify-center px-4 py-10 text-white antialiased overflow-hidden">
    <div class="pointer-events-none absolute -top-20 -left-20 h-72 w-72 rounded-full bg-premium-gold/10 blur-[120px] animate-pulse"></div>
    <div class="pointer-events-none absolute -bottom-20 -right-20 h-80 w-80 rounded-full bg-premium-gold/10 blur-[120px] animate-pulse"></div>

    <div class="relative z-10 w-full max-w-md">
        <div class="premium-panel rounded-2xl p-7 sm:p-8">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full border border-premium-gold/40 bg-premium-gold/10 text-xl font-black text-premium-gold shadow-premium">
                    GP
                </div>
                <h2 class="text-3xl font-black tracking-tight text-white">
                    Crear <span class="text-premium-gold">Cuenta</span>
                </h2>
                <p class="mt-2 text-sm text-slate-300">Únete a Gimnasio Pretorianos</p>
            </div>

            @if($errors->any())
                <div class="mb-5 rounded-xl border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST" class="space-y-5" novalidate>
                @csrf

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-200">Nombre Completo</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="premium-input mt-1 block w-full rounded-xl px-4 py-3 text-sm placeholder:text-slate-500 @error('name') border-red-500/60 @enderror"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Correo Electrónico</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="premium-input mt-1 block w-full rounded-xl px-4 py-3 text-sm placeholder:text-slate-500 @error('email') border-red-500/60 @enderror"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Contraseña</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="premium-input mt-1 block w-full rounded-xl px-4 py-3 text-sm placeholder:text-slate-500 @error('password') border-red-500/60 @enderror"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-200">Confirmar Contraseña</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        class="premium-input mt-1 block w-full rounded-xl px-4 py-3 text-sm placeholder:text-slate-500 @error('password_confirmation') border-red-500/60 @enderror"
                    >
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full rounded-xl bg-premium-gold px-4 py-3 text-base font-black text-black transition duration-200 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300/30">
                    Registrarse
                </button>
            </form>

            <div class="mt-6 border-t border-white/10 pt-4 text-center text-sm text-slate-300">
                <span>¿Ya tienes una cuenta?</span>
                <a href="{{ route('login') }}" class="ml-1 font-semibold text-premium-gold transition hover:text-yellow-300">
                    Inicia sesión
                </a>
            </div>
        </div>
    </div>

</body>
</html>