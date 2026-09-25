<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio Pretorianos - Dashboard</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-[#edf1f5] font-sans antialiased" x-data="{ sidebarOpen: true }">

    <div class="flex min-h-screen w-full items-stretch">

        <!-- Sidebar Oscuro TailAdmin -->
        <aside class="h-screen bg-[#1C2434] text-gray-300 flex flex-col transition-all duration-300 shadow-lg flex-shrink-0 border-r border-gray-700/60 sticky top-0"
               :class="sidebarOpen ? 'w-72' : 'w-20'">
            <div class="flex flex-1 min-h-0 flex-col">
                <!-- Header del Sidebar -->
                <div class="h-16 flex items-center justify-between px-6 bg-[#18202F]">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-dumbbell text-2xl text-blue-500"></i>
                        <span class="font-bold text-xl text-white tracking-wide" x-show="sidebarOpen">PRETORIANOS</span>
                    </div>
                </div>

                <!-- Menú -->
                @php
                    $rolActual = auth()->user()->rol;
                    $rutaDashboard = match ($rolActual) {
                        'super_admin' => route('administrador.dashboard'),
                        'admin', 'recepcionista' => route('recepcionista.dashboard'),
                        default => route('cliente.dashboard'),
                    };
                    $esSuperAdmin = $rolActual === 'super_admin';
                    $esStaff = in_array($rolActual, ['super_admin', 'admin', 'recepcionista']);
                    $nombreRol = match ($rolActual) {
                        'super_admin', 'admin' => 'Administrador',
                        'recepcionista' => 'Recepcionista',
                        default => ucfirst(str_replace('_', ' ', $rolActual)),
                    };
                @endphp

                <nav class="mt-6 px-4 space-y-1 flex-1 min-h-0 overflow-y-auto">
                    <p class="text-xs font-semibold text-gray-400 px-3 uppercase mb-2" x-show="sidebarOpen">Menú Principal</p>

                    <a href="{{ $rutaDashboard }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs(['administrador.dashboard', 'recepcionista.dashboard', 'cliente.dashboard']) ? 'text-white bg-[#333A48]' : 'text-gray-400 hover:bg-[#333A48] hover:text-white' }}">
                        <i class="fa-solid fa-chart-pie w-6 text-center"></i>
                        <span class="font-medium text-sm ml-2" x-show="sidebarOpen">Dashboard</span>
                    </a>

                    @if ($esSuperAdmin)
                        <a href="{{ route('usuarios.index') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('usuarios.*') ? 'text-white bg-[#333A48]' : 'text-gray-400 hover:bg-[#333A48] hover:text-white' }}">
                            <i class="fa-solid fa-users w-6 text-center"></i>
                            <span class="font-medium text-sm ml-2" x-show="sidebarOpen">Usuarios</span>
                        </a>
                    @endif

                    @if ($esStaff)
                        <a href="{{ route('membresias.index') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('membresias.*') ? 'text-white bg-[#333A48]' : 'text-gray-400 hover:bg-[#333A48] hover:text-white' }}">
                            <i class="fa-solid fa-id-card w-6 text-center"></i>
                            <span class="font-medium text-sm ml-2" x-show="sidebarOpen">Membresías</span>
                        </a>

                        <a href="{{ route('pagos.index') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('pagos.*') ? 'text-white bg-[#333A48]' : 'text-gray-400 hover:bg-[#333A48] hover:text-white' }}">
                            <i class="fa-solid fa-money-bill-wave w-6 text-center"></i>
                            <span class="font-medium text-sm ml-2" x-show="sidebarOpen">Pagos</span>
                        </a>

                        <a href="{{ route('asistencias.index') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('asistencias.*') ? 'text-white bg-[#333A48]' : 'text-gray-400 hover:bg-[#333A48] hover:text-white' }}">
                            <i class="fa-solid fa-clipboard-check w-6 text-center"></i>
                            <span class="font-medium text-sm ml-2" x-show="sidebarOpen">Asistencias</span>
                        </a>
                    @endif
                </nav>
            </div>

            <!-- Botón Salir -->
            <div class="p-4 border-t border-gray-700/50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 bg-red-600/10 hover:bg-red-600 text-red-500 hover:text-white py-2 px-4 rounded-lg transition-all text-sm font-semibold">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span x-show="sidebarOpen">Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Contenido Central -->
        <div class="flex-1 flex flex-col min-w-0 h-screen overflow-y-auto">

            <!-- Navbar Top -->
            <header class="bg-white shadow-sm border-b border-gray-200 h-20 flex items-center justify-between px-6 sticky top-0 z-10">
                <div class="flex items-center space-x-4 w-full">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700 focus:outline-none shrink-0">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                    <div class="relative hidden sm:block flex-1 max-w-[680px]">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.5 text-gray-400 text-sm"></i>
                        <input type="text" placeholder="Buscar socios, pagos..." class="pl-11 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                    </div>
                </div>

                <div class="flex items-center space-x-4 shrink-0">
                    <div class="text-right">
                        <p class="text-xs text-blue-600 font-bold uppercase tracking-wider">{{ $nombreRol }}</p>
                    </div>
                    <div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                </div>
            </header>

            <!-- Sección Dinámica -->
            <main class="flex-1 p-4 sm:p-6 bg-[#edf1f5] min-w-0">
                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
