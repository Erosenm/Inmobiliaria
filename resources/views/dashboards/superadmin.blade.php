<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin - Gimnasio Pretorianos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        premium: {
                            gold: '#f5c518',
                            black: '#0b0b0b',
                            panel: '#171717',
                            soft: '#1f1f1f'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: #0b0b0b;
            background-image:
                linear-gradient(rgba(245, 197, 24, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(245, 197, 24, 0.06) 1px, transparent 1px);
            background-size: 28px 28px;
        }
    </style>
</head>
<body class="min-h-screen text-white antialiased">
    <nav class="border-b border-white/10 bg-[#111111]/90 backdrop-blur-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-premium-gold/80">Gimnasio Pretorianos</p>
                <h1 class="mt-1 text-lg font-bold text-white sm:text-xl">Panel Super Administrador</h1>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-xl border border-red-500/40 bg-red-500/10 px-4 py-2 text-sm font-semibold text-red-200 transition hover:bg-red-500 hover:text-white">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <header class="mb-8">
            <p class="mb-2 text-sm uppercase tracking-[0.2em] text-premium-gold/80">Dashboard</p>
            <h2 class="text-3xl font-black text-white sm:text-4xl">Bienvenido, {{ auth()->user()->name }}</h2>
            <p class="mt-3 text-sm text-slate-300 sm:text-base">Aquí tienes un resumen de la gestión del gimnasio.</p>
        </header>

        <section class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            <a href="{{ route('usuarios.index') }}" class="group block rounded-2xl border border-white/10 bg-[#1a1a1a] p-6 transition duration-200 hover:-translate-y-1 hover:border-premium-gold/60 hover:shadow-[0_0_0_1px_rgba(245,197,24,0.2),0_20px_40px_rgba(0,0,0,0.45)]">
                <div class="mb-5 flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-premium-gold/10 text-premium-gold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M16 19v-1a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v1"/>
                            <circle cx="10" cy="7" r="3.5"/>
                            <path d="M22 19v-1a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <span class="rounded-full border border-premium-gold/35 bg-premium-gold/10 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-premium-gold">Users</span>
                </div>

                <h3 class="text-xl font-bold text-white">Gestión de Usuarios</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Administra el personal y clientes.</p>
                <div class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-premium-gold">
                    Ir a Usuarios <span aria-hidden="true">→</span>
                </div>
            </a>

            <a href="{{ route('membresias.index') }}" class="group block rounded-2xl border border-white/10 bg-[#1a1a1a] p-6 transition duration-200 hover:-translate-y-1 hover:border-premium-gold/60 hover:shadow-[0_0_0_1px_rgba(245,197,24,0.2),0_20px_40px_rgba(0,0,0,0.45)]">
                <div class="mb-5 flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-premium-gold/10 text-premium-gold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M3 7.5A2.5 2.5 0 0 1 5.5 5h13A2.5 2.5 0 0 1 21 7.5v9A2.5 2.5 0 0 1 18.5 19h-13A2.5 2.5 0 0 1 3 16.5v-9Z"/>
                            <path d="M3 10h18"/>
                            <path d="M7 15h4"/>
                        </svg>
                    </div>
                    <span class="rounded-full border border-premium-gold/35 bg-premium-gold/10 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-premium-gold">Plans</span>
                </div>

                <h3 class="text-xl font-bold text-white">Planes y Membresías</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Configura los precios y duraciones.</p>
                <div class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-premium-gold">
                    Ir a Membresías <span aria-hidden="true">→</span>
                </div>
            </a>

            <div class="rounded-2xl border border-white/10 bg-[#1a1a1a] p-6 opacity-90">
                <div class="mb-5 flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-premium-gold/10 text-premium-gold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.86l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.17V21a2 2 0 1 1-4 0v-.09a1.7 1.7 0 0 0-.4-1.17 1.7 1.7 0 0 0-1-.6 1.7 1.7 0 0 0-1.86.34l-.06.06A2 2 0 1 1 4.3 17.6l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.17-.4H2.75a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.01 8.9a1.7 1.7 0 0 0 .6-1 1.7 1.7 0 0 0-.34-1.86l-.06-.06A2 2 0 1 1 7.04 3.15l.06.06A1.7 1.7 0 0 0 9 3.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .4-1.17V1.75a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15.1 3.99a1.7 1.7 0 0 0 1 .6 1.7 1.7 0 0 0 1.86-.34l.06-.06A2 2 0 1 1 20.85 7l-.06.06A1.7 1.7 0 0 0 19.4 9a1.7 1.7 0 0 0 .6 1 1.7 1.7 0 0 0 1.17.4h.09a2 2 0 1 1 0 4h-.09a1.7 1.7 0 0 0-1.17.4 1.7 1.7 0 0 0-.6 1Z"/>
                        </svg>
                    </div>
                    <span class="rounded-full border border-premium-gold/35 bg-premium-gold/10 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-premium-gold">System</span>
                </div>

                <h3 class="text-xl font-bold text-white">Ajustes del Sistema</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Configuración global del gimnasio.</p>
                <div class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-slate-400">
                    Control Total
                </div>
            </div>
        </section>
    </main>
</body>
</html>