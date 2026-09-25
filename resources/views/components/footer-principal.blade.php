 <!-- Contacto / Footer Section -->
    <footer id="contacto" class="bg-[#070707] border-t border-white/10 pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <!-- Columna 1: Info -->
                <div class="space-y-4 md:col-span-2">
                    <a href="#" class="flex items-center gap-3 tracking-widest uppercase font-black">
                        <div class="w-8 h-8 rounded-full border border-[#f4c430] bg-white/5 flex items-center justify-center text-[#f4c430] text-sm font-black">
                            P
                        </div>
                        <span class="text-base text-white">Pretorianos</span>
                    </a>
                    <p class="text-sm text-white/60 max-w-sm">
                        Club de entrenamiento enfocado en fuerza, disciplina y resultados reales. Supera tus límites con nosotros.
                    </p>
                </div>

                <!-- Columna 2: Ubicación & Horario -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-[#f4c430] mb-4">Ubicación y Horarios</h4>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li> Av. Principal #123</li>
                        <li> Lunes a Viernes: 06:00 - 22:00</li>
                        <li> Sábados: 08:00 - 18:00</li>
                    </ul>
                </div>

                <!-- Columna 3: Contacto -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-[#f4c430] mb-4">Contacto</h4>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li> +591 70000000</li>
                        <li> contacto@pretorianos.com</li>
                        <li> WhatsApp Directo</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-white/40">
                <p>&copy; {{ date('Y') }} PRETORIANOS Performance Club. Todos los derechos reservados.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white transition-colors">Términos</a>
                    <a href="#" class="hover:text-white transition-colors">Privacidad</a>
                </div>
            </div>
        </div>
    </footer>
    
</body>
