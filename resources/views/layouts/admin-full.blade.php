@props(['title' => 'Admin'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | {{ config('app.name', 'GNE Admin') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-800">
    <div class="flex min-h-screen">
        
        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col sticky top-0 h-screen">
            {{-- Logo Area --}}
            <div class="p-6">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-600 rounded-xl shadow-lg shadow-blue-200 flex items-center justify-center text-white font-bold">G</div>
                    <span class="font-black text-xl tracking-tighter uppercase">GNE Admin</span>
                </a>
            </div>

            {{-- Navigasi --}}
            <nav class="flex-grow px-4 space-y-1.5 mt-4">
                {{-- Menu Dashboard --}}
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                    Dashboard
                </x-nav-link>

                <div class="pt-6 pb-2 px-3 text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">Master Data</div>
                
                {{-- Sektor & Produk --}}
                <x-nav-link :href="route('admin.sectors.index')" :active="request()->routeIs('admin.sectors.*')" icon="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    Sektor & Produk
                </x-nav-link>

                {{-- Standar Harga --}}
                <x-nav-link :href="route('admin.price-standards.index')" :active="request()->routeIs('admin.price-standards.*')" icon="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                    Standar Harga
                </x-nav-link>

                <div class="pt-6 pb-2 px-3 text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">Sistem</div>

                {{-- Informasi --}}
                <x-nav-link :href="route('admin.information.index')" :active="request()->routeIs('information.*')" icon="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    Informasi
                </x-nav-link>
            </nav>

            {{-- User Profile / Bottom Sidebar --}}
            <div class="p-4 border-t border-gray-50 bg-gray-50/50">
                <div class="flex items-center gap-3 p-2 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center font-bold text-blue-600 text-xs uppercase">
                        {{ substr(auth()->user()->name, 0, 2) }}
                    </div>
                    <div class="flex-grow overflow-hidden">
                        <p class="text-[11px] font-black text-gray-800 truncate">{{ auth()->user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-[9px] font-bold text-red-400 hover:text-red-600 transition-colors uppercase tracking-widest">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="flex-grow flex flex-col min-w-0">
            {{-- Navbar Atas --}}
            <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-10 px-8 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-1">Halaman</h1>
                        <p class="text-lg font-bold text-gray-800 tracking-tight">{{ $title }}</p>
                    </div>
                    
                    {{-- Alert Notification --}}
                    <div>
                        @if(session('success'))
                            <div class="flex items-center gap-2 bg-emerald-50 text-emerald-600 px-4 py-2 rounded-xl text-xs font-bold border border-emerald-100 animate-in fade-in slide-in-from-top-2 duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </header>

            {{-- Area Konten --}}
            <main class="w-full p-0">
                <div class="w-full">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>