<header class="fixed top-0 left-0 w-full z-50 bg-[#090909]/80 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="#" class="flex items-center gap-3 tracking-widest uppercase font-black">
                <div class="w-10 h-10 rounded-full border border-[#f4c430] bg-white/5 flex items-center justify-center text-[#f4c430] text-lg font-black">
                    P
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-lg text-white">Pretorianos</span>
                    <small class="text-[9px] tracking-[0.2em] text-white/60 mt-1">Performance Club</small>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="#inicio" class="text-xs uppercase tracking-widest text-white/80 hover:text-[#f4c430] transition-colors">Inicio</a>
                <a href="#nosotros" class="text-xs uppercase tracking-widest text-white/80 hover:text-[#f4c430] transition-colors">Nosotros</a>
                <a href="#disciplinas" class="text-xs uppercase tracking-widest text-white/80 hover:text-[#f4c430] transition-colors">Disciplinas</a>
                <a href="#planes" class="text-xs uppercase tracking-widest text-white/80 hover:text-[#f4c430] transition-colors">Planes</a>
                <a href="#contacto" class="text-xs uppercase tracking-widest text-white/80 hover:text-[#f4c430] transition-colors">Contacto</a>
            </nav>

            <a href="{{ route('login') }}" class="inline-flex items-center justify-center h-11 px-6 rounded-full bg-gradient-to-r from-[#f4c430] to-[#ffcf33] text-black font-extrabold text-xs uppercase tracking-wider hover:scale-105 shadow-[0_10px_25px_rgba(244,196,48,0.25)] transition-all">
                Únete Ahora
            </a>
        </div>
    </header>