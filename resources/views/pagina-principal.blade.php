
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRETORIANOS - Performance Club</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#090909] text-[#f5f5f5] font-sans antialiased selection:bg-[#f4c430] selection:text-black">

@include('components.navbar-principal')

    <!-- Hero Section -->
    <section id="inicio" class="relative min-h-screen flex items-center pt-24 bg-cover bg-center" style="background-image: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.4) 100%), url('{{ asset('images/fondo.jpg') }}');">
        <div class="max-w-7xl mx-auto px-6 py-12 w-full grid md:grid-cols-2 items-center gap-12">
            <div class="space-y-6">
                <span class="inline-block text-xs font-bold uppercase tracking-[0.2em] text-[#f4c430] border-l-2 border-[#f4c430] pl-3">
                    Fitness • Performance • Disciplina
                </span>
                <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tight text-white leading-none">
                    Entrena.<br>Supera.<br><span class="text-[#f4c430]">Evoluciona.</span>
                </h1>
                <p class="text-base text-white/70 max-w-lg">
                    Entrena con intensidad, disciplina y estructura para transformar tu cuerpo, tu energía y tu vida diaria.
                </p>
                <div class="flex flex-wrap items-center gap-4 pt-4">
                    <a href="#planes" class="h-12 px-8 rounded-full bg-[#f4c430] text-black font-extrabold text-xs uppercase tracking-wider flex items-center justify-center hover:bg-[#ffcf33] transition-colors">
                        Comenzar Ahora
                    </a>
                    <a href="#planes" class="h-12 px-8 rounded-full border border-white/20 bg-white/5 text-white font-extrabold text-xs uppercase tracking-wider flex items-center justify-center hover:border-[#f4c430] hover:text-[#f4c430] transition-colors">
                        Ver Planes
                    </a>
                </div>
                
                <div class="flex items-center gap-8 pt-8 border-t border-white/10">
                    <div>
                        <strong class="block text-3xl font-black text-white">+10</strong>
                        <span class="text-[10px] uppercase tracking-wider text-white/60">Entrenadores</span>
                    </div>
                    <div>
                        <strong class="block text-3xl font-black text-[#f4c430]">+500</strong>
                        <span class="text-[10px] uppercase tracking-wider text-white/60">Socios Activos</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beneficios Section -->
    <section id="nosotros" class="py-24 bg-[#0c0c0c] border-y border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Por qué elegirnos</span>
                <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight text-white mt-2">Entrena Diferente</h2>
                <p class="text-white/60 mt-2">Más que un gimnasio: una experiencia pensada para resultados reales.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white/[0.02] border border-white/10 rounded-2xl p-6 hover:border-[#f4c430]/50 transition-all hover:-translate-y-2">
                    <span class="text-2xl font-black text-[#f4c430] block mb-6">01</span>
                    <h3 class="text-lg font-bold uppercase mb-2">Equipamiento Premium</h3>
                    <p class="text-sm text-white/60">Máquinas de alto rendimiento y área de fuerza pensada para cada nivel.</p>
                </div>
                <div class="bg-white/[0.02] border border-white/10 rounded-2xl p-6 hover:border-[#f4c430]/50 transition-all hover:-translate-y-2">
                    <span class="text-2xl font-black text-[#f4c430] block mb-6">02</span>
                    <h3 class="text-lg font-bold uppercase mb-2">Entrenadores</h3>
                    <p class="text-sm text-white/60">Profesionales especializados en técnica, motivación y progresión sostenida.</p>
                </div>
                <div class="bg-white/[0.02] border border-white/10 rounded-2xl p-6 hover:border-[#f4c430]/50 transition-all hover:-translate-y-2">
                    <span class="text-2xl font-black text-[#f4c430] block mb-6">03</span>
                    <h3 class="text-lg font-bold uppercase mb-2">Horarios Flexibles</h3>
                    <p class="text-sm text-white/60">Entrena cuando te convenga y adapta tu rutina a tu tiempo y objetivos.</p>
                </div>
                <div class="bg-white/[0.02] border border-white/10 rounded-2xl p-6 hover:border-[#f4c430]/50 transition-all hover:-translate-y-2">
                    <span class="text-2xl font-black text-[#f4c430] block mb-6">04</span>
                    <h3 class="text-lg font-bold uppercase mb-2">Comunidad</h3>
                    <p class="text-sm text-white/60">Un ambiente enfocado en la superación personal y la disciplina constante.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Disciplinas Section -->
    <section id="disciplinas" class="py-24 bg-[#090909]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Especialidades</span>
                <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight text-white mt-2">Nuestras Disciplinas</h2>
                <p class="text-white/60 mt-2">Áreas especializadas para elevar tu rendimiento al máximo nivel.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Disciplina 1 -->
                <div class="group relative rounded-3xl overflow-hidden bg-[#121212] border border-white/10 hover:border-[#f4c430]/50 transition-all">
                    <div class="h-64 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('{{ asset('images/musculacion.jpg') }}');"></div>
                    <div class="p-8">
                        <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Fuerza & Hipertrofia</span>
                        <h3 class="text-2xl font-black uppercase text-white mt-2">Musculación</h3>
                        <p class="text-sm text-white/60 mt-3">Zona completa de peso libre, mancuernas, barras olímpicas y maquinaria biomecánica.</p>
                    </div>
                </div>

                <!-- Disciplina 2 -->
                <div class="group relative rounded-3xl overflow-hidden bg-[#121212] border border-white/10 hover:border-[#f4c430]/50 transition-all">
                    <div class="h-64 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('{{ asset('images/cardio.jpg') }}');"></div>
                    <div class="p-8">
                        <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Resistencia & Cardio</span>
                        <h3 class="text-2xl font-black uppercase text-white mt-2">Functional Training</h3>
                        <p class="text-sm text-white/60 mt-3">Rutinas de alta intensidad para mejorar agilidad, movilidad y acondicionamiento.</p>
                    </div>
                </div>

                <!-- Disciplina 3 -->
                <div class="group relative rounded-3xl overflow-hidden bg-[#121212] border border-white/10 hover:border-[#f4c430]/50 transition-all">
                    <div class="h-64 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('{{ asset('images/personal.jpg') }}');"></div>
                    <div class="p-8">
                        <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Enfoque 1 a 1</span>
                        <h3 class="text-2xl font-black uppercase text-white mt-2">Personal Training</h3>
                        <p class="text-sm text-white/60 mt-3">Atención personalizada con entrenadores calificados para metas específicas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Planes Section -->
    <section id="planes" class="py-24 bg-[#0c0c0c] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Membresías</span>
                <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight text-white mt-2">Nuestros Planes</h2>
                <p class="text-white/60 mt-2">Elige la opción que mejor se adapte a tu ritmo de entrenamiento y metas personales.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Plan Básico -->
                <div class="bg-white/[0.02] border border-white/10 rounded-3xl p-8 flex flex-col justify-between hover:border-white/30 transition-all relative overflow-hidden">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-white/60">Pase Mensual</span>
                        <h3 class="text-2xl font-black uppercase text-white mt-2">Plan Básico</h3>
                        <div class="my-6">
                            <span class="text-4xl font-black text-white">180 Bs</span>
                            <span class="text-xs text-white/60">/ mes</span>
                        </div>
                        <ul class="space-y-4 text-sm text-white/70 mb-8">
                            <li class="flex items-center gap-3">✓ Acceso a área de musculación</li>
                            <li class="flex items-center gap-3">✓ Uso de vestidores y lockers</li>
                            <li class="flex items-center gap-3 text-white/30">✕ Evaluación física inicial</li>
                            <li class="flex items-center gap-3 text-white/30">✕ Acceso a clases grupales</li>
                        </ul>
                    </div>
                    <a href="{{ route('login') }}" class="w-full h-12 rounded-full border border-white/20 bg-white/5 text-white font-extrabold text-xs uppercase tracking-wider flex items-center justify-center hover:bg-white hover:text-black transition-all">
                        Elegir Plan
                    </a>
                </div>

                <!-- Plan Pro -->
                <div class="bg-[#121212] border-2 border-[#f4c430] rounded-3xl p-8 flex flex-col justify-between shadow-[0_0_30px_rgba(244,196,48,0.15)] relative overflow-hidden transform md:-translate-y-4">
                    <div class="absolute top-4 right-4 bg-[#f4c430] text-black text-[10px] font-black uppercase px-3 py-1 rounded-full tracking-wider">
                        Más Popular
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#f4c430]">Pase Semestral</span>
                        <h3 class="text-2xl font-black uppercase text-white mt-2">Plan Pro</h3>
                        <div class="my-6">
                            <span class="text-4xl font-black text-[#f4c430]">250 Bs</span>
                            <span class="text-xs text-white/60">/ mes</span>
                        </div>
                        <ul class="space-y-4 text-sm text-white/90 mb-8">
                            <li class="flex items-center gap-3"><span class="text-[#f4c430]">✓</span> Acceso ilimitado total</li>
                            <li class="flex items-center gap-3"><span class="text-[#f4c430]">✓</span> Evaluación física personalizada</li>
                            <li class="flex items-center gap-3"><span class="text-[#f4c430]">✓</span> Clases grupales dirigidas</li>
                            <li class="flex items-center gap-3"><span class="text-[#f4c430]">✓</span> Rutina digital guiada</li>
                        </ul>
                    </div>
                    <a href="{{ route('login') }}" class="w-full h-12 rounded-full bg-[#f4c430] text-black font-extrabold text-xs uppercase tracking-wider flex items-center justify-center hover:bg-[#ffcf33] shadow-[0_10px_20px_rgba(244,196,48,0.2)] transition-all">
                        Comenzar Ahora
                    </a>
                </div>

                <!-- Plan Elite -->
                <div class="bg-white/[0.02] border border-white/10 rounded-3xl p-8 flex flex-col justify-between hover:border-white/30 transition-all relative overflow-hidden">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-white/60">Pase Anual</span>
                        <h3 class="text-2xl font-black uppercase text-white mt-2">Plan Elite</h3>
                        <div class="my-6">
                            <span class="text-4xl font-black text-white">200 Bs</span>
                            <span class="text-xs text-white/60">/ mes</span>
                        </div>
                        <ul class="space-y-4 text-sm text-white/70 mb-8">
                            <li class="flex items-center gap-3">✓ Todos los beneficios de Plan Pro</li>
                            <li class="flex items-center gap-3">✓ 1 Invitado libre por mes</li>
                            <li class="flex items-center gap-3">✓ Descuento en suplementación</li>
                            <li class="flex items-center gap-3">✓ Asesoría nutricional básica</li>
                        </ul>
                    </div>
                    <a href="{{ route('login') }}" class="w-full h-12 rounded-full border border-white/20 bg-white/5 text-white font-extrabold text-xs uppercase tracking-wider flex items-center justify-center hover:bg-white hover:text-black transition-all">
                        Elegir Plan
                    </a>
                </div>
            </div>
        </div>
    </section>

@include('components.footer-principal')