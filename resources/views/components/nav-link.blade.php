@props(['active', 'icon' => ''])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-2xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-blue-200 transition-all'
            : 'flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-gray-50 hover:text-gray-700 rounded-2xl font-bold text-xs uppercase tracking-widest transition-all';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
    </svg>
    <span>{{ $slot }}</span>
</a>