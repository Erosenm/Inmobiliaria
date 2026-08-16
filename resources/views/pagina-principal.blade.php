@extends('layouts.app-gimnasio')

@section('content')
    <header class="site-header">
        @include('components.navbar-principal')
    </header>

    <main>
        <section
            class="hero"
            id="inicio"
            style="background-image: linear-gradient(90deg, rgba(0,0,0,0.76) 0%, rgba(0,0,0,0.58) 35%, rgba(0,0,0,0.34) 100%), url('{{ asset('images/fondo.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
        >
            <div class="hero__overlay"></div>
            <div class="container hero__inner">
                <div class="hero__content reveal reveal--up">
                    <div class="eyebrow">FITNESS • PERFORMANCE • DISCIPLINA</div>
                    <h1>ENTRENA.<br>SUPERA.<br>EVOLUCIONA.</h1>
                    <p>
                        Entrena con intensidad, disciplina y estructura para transformar tu cuerpo,
                        tu energía y tu vida diaria.
                    </p>
                    <div class="hero__actions">
                        <a href="#planes" class="button button--primary">COMENZAR AHORA</a>
                        <a href="#disciplinas" class="button button--secondary">VER PLANES</a>
                    </div>
                    <div class="hero__stats">
                        <div>
                            <strong>+10</strong>
                            <span>Años de experiencia</span>
                        </div>
                        <div>
                            <strong>+5K</strong>
                            <span>Miembros activos</span>
                        </div>
                    </div>
                </div>

                <div class="scroll-indicator reveal reveal--up" aria-label="Scroll">
                    <span>SCROLL</span>
                    <div class="scroll-indicator__line"></div>
                </div>
            </div>
        </section>

        <section class="section section--dark" id="nosotros">
            <div class="container">
                <div class="section-heading reveal reveal--up">
                    <span class="eyebrow eyebrow--yellow">POR QUÉ ELEGIRNOS</span>
                    <h2>ENTRENA DIFERENTE</h2>
                    <p>Más que un gimnasio: una experiencia pensada para resultados reales.</p>
                </div>

                <div class="benefits-grid">
                    @php
                        $benefits = [
                            ['number' => '01', 'title' => 'EQUIPAMIENTO PREMIUM', 'text' => 'Máquinas de alto rendimiento y área de fuerza pensada para cada nivel.'],
                            ['number' => '02', 'title' => 'ENTRENADORES', 'text' => 'Profesionales especializados en técnica, motivación y progresión sostenida.'],
                            ['number' => '03', 'title' => 'HORARIOS FLEXIBLES', 'text' => 'Entrena cuando te convenga y adapta tu rutina a tu tiempo y objetivos.'],
                            ['number' => '04', 'title' => 'AMBIENTE', 'text' => 'Un espacio moderno, disciplinado y potente para mantenerte enfocado.'],
                        ];
                    @endphp

                    @foreach ($benefits as $benefit)
                        <article class="benefit-card reveal reveal--up">
                            <div class="benefit-card__top">
                                <span class="benefit-card__number">{{ $benefit['number'] }}</span>
                                <span class="benefit-card__icon">✦</span>
                            </div>
                            <h3>{{ $benefit['title'] }}</h3>
                            <p>{{ $benefit['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section--light" id="disciplinas">
            <div class="container">
                <div class="section-heading reveal reveal--up">
                    <span class="eyebrow eyebrow--dark">DISCIPLINAS</span>
                    <h2>ENTRENA CON PROPOSITO</h2>
                    <p>Variedad de metodologías para construir fuerza, resistencia y mejor rendimiento.</p>
                </div>

                @php
                    $disciplines = [
                        ['name' => 'MUSCULACIÓN', 'description' => 'Fuerza, técnica y progresión constante.', 'image' => '/images/disc-musculacion.svg'],
                        ['name' => 'FUNCIONAL', 'description' => 'Movimiento, potencia, coordinación y resistencia.', 'image' => '/images/disc-funcional.svg'],
                        ['name' => 'ZUMBA', 'description' => 'Cardio dinámico, energía y ritmo.', 'image' => '/images/disc-zumba.svg'],
                        ['name' => 'SPINNING', 'description' => 'Intervalos intensos para mejorar tu resistencia.', 'image' => '/images/disc-spinning.svg'],
                        ['name' => 'CROSS TRAINING', 'description' => 'Entrenamiento completo y desafiante.', 'image' => '/images/disc-cross-training.svg'],
                        ['name' => 'CARDIO', 'description' => 'Control, quemas, salud y condición física.', 'image' => '/images/disc-cardio.svg'],
                        ['name' => 'BOXEO', 'description' => 'Poder, agilidad y disciplina de combate.', 'image' => '/images/disc-boxeo.svg'],
                        ['name' => 'HIIT', 'description' => 'Máximo esfuerzo en ciclos breves y eficaces.', 'image' => '/images/disc-hiit.svg'],
                    ];
                @endphp

                <div class="discipline-grid">
                    @foreach ($disciplines as $discipline)
                        <article class="discipline-card reveal reveal--up" style="--discipline-image: url('{{ $discipline['image'] }}');">
                            <div class="discipline-card__content">
                                <span class="discipline-card__tag">CLASE</span>
                                <h3>{{ $discipline['name'] }}</h3>
                                <p>{{ $discipline['description'] }}</p>
                                <span class="discipline-card__arrow">→</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="stats">
            <div class="container stats__grid">
                <div class="stat reveal reveal--up">
                    <span class="stat__value" data-target="10">0</span>
                    <span class="stat__label">AÑOS DE EXPERIENCIA</span>
                </div>
                <div class="stat reveal reveal--up">
                    <span class="stat__value" data-target="5000">0</span>
                    <span class="stat__label">MIEMBROS</span>
                </div>
                <div class="stat reveal reveal--up">
                    <span class="stat__value" data-target="20">0</span>
                    <span class="stat__label">DISCIPLINAS</span>
                </div>
                <div class="stat reveal reveal--up">
                    <span class="stat__value" data-target="365">0</span>
                    <span class="stat__label">DÍAS AL AÑO</span>
                </div>
            </div>
        </section>

        <section class="section section--dark section--plans" id="planes">
            <div class="container">
                <div class="section-heading reveal reveal--up">
                    <span class="eyebrow eyebrow--yellow">PLANES</span>
                    <h2>ELIGE TU RITMO</h2>
                    <p>Opciones pensadas para cada nivel y propósito.</p>
                </div>

                @php
                    $plans = [
                        ['name' => 'BÁSICO', 'price' => 'Bs. 420', 'tag' => null, 'features' => ['Acceso a gimnasio', 'Uso de área cardio', 'Locker básico']],
                        ['name' => 'PRO', 'price' => 'Bs. 690', 'tag' => 'MÁS ELEGIDO', 'features' => ['Acceso ilimitado', '1 clase grupal por semana', 'Evaluación inicial', 'Asesoría mensual']],
                        ['name' => 'PREMIUM', 'price' => 'Bs. 990', 'tag' => null, 'features' => ['Todo de PRO', 'Clases ilimitadas', 'Entrenador personal', 'Prioridad en reservas']],
                    ];
                @endphp

                <div class="plans-grid">
                    @foreach ($plans as $plan)
                        <article class="plan-card {{ $plan['tag'] ? 'plan-card--featured' : '' }} reveal reveal--up">
                            @if ($plan['tag'])
                                <span class="plan-card__tag">{{ $plan['tag'] }}</span>
                            @endif
                            <h3>{{ $plan['name'] }}</h3>
                            <div class="plan-card__price">{{ $plan['price'] }} <span>/ MES</span></div>
                            <ul>
                                @foreach ($plan['features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                            <a href="#contacto" class="button button--primary plan-card__button">ELEGIR PLAN</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container cta__inner reveal reveal--up">
                <div>
                    <span class="eyebrow eyebrow--yellow">TU MEJOR VERSIÓN</span>
                    <h2>EMPIEZA HOY.</h2>
                </div>
                <a href="#contacto" class="button button--primary">ÚNETE AHORA</a>
            </div>
        </section>
    </main>

    @include('components.footer-principal')
@endsection
