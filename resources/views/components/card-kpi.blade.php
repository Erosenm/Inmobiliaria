@props([
    'titulo' => '', 'valor' => '0', 'icono' => 'fa-chart-line',
    'color' => 'blue', 'porcentaje' => null, 'esPositivo' => true,
])
@php
    $colores = [
        'blue' => ['bg'=>'bg-blue-50','text'=>'text-blue-500'],
        'emerald' => ['bg'=>'bg-emerald-50','text'=>'text-emerald-500'],
        'amber' => ['bg'=>'bg-amber-50','text'=>'text-amber-500'],
        'indigo' => ['bg'=>'bg-indigo-50','text'=>'text-indigo-500'],
        'purple' => ['bg'=>'bg-purple-50','text'=>'text-purple-500'],
        'red' => ['bg'=>'bg-red-50','text'=>'text-red-500'],
    ];
    $c = $colores[$color] ?? $colores['blue'];
@endphp
<div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
    <div class="w-12 h-12 rounded-full {{ $c['bg'] }} flex items-center justify-center {{ $c['text'] }} mb-4">
        <i class="fa-solid {{ $icono }} text-lg"></i>
    </div>
    <div class="flex items-end justify-between">
        <div>
            <h3 class="text-2xl font-black text-gray-900">{{ $valor }}</h3>
            <p class="text-sm text-gray-500 mt-1">{{ $titulo }}</p>
        </div>
        @if (!is_null($porcentaje))
            <span class="flex items-center gap-1 text-xs font-semibold {{ $esPositivo ? 'text-emerald-500' : 'text-red-500' }}">
                <i class="fa-solid {{ $esPositivo ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                {{ $porcentaje }}
            </span>
        @endif
    </div>
</div>