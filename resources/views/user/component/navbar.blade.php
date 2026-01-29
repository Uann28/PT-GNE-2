<header x-data="{ scrolled: false, mobileMenuOpen: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="scrolled ? 'bg-[#334168]/95 backdrop-blur-md shadow-lg py-2' : 'bg-[#334168] py-4'"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300 text-white">

    {{-- TOP INFO BAR --}}
    <div x-show="!scrolled" class="max-w-7xl mx-auto px-6 pb-2 flex justify-between items-center text-xs md:text-sm border-b border-white/10 mb-2 transition-all">
        <div class="flex items-center gap-2 opacity-80">
            <span>BUMD Provinsi Nusa Tenggara Barat</span>
        </div>
        <div class="hidden md:flex gap-6 text-gray-200 font-light">
            <a href="tel:0370631646" class="hover:text-[#F88008] transition">📞 (0370) 631646</a>
            <a href="mailto:info@gne.co.id" class="hover:text-[#F88008] transition">✉ info@gne.co.id</a>
        </div>
    </div>

    {{-- MAIN NAV --}}
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between relative">
        
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <img src="/favicon.ico" alt="GNE Logo" class="w-10 h-10 md:w-12 md:h-12 object-contain drop-shadow-md group-hover:scale-105 transition">
            <div class="leading-tight">
                <h1 class="font-bold text-lg md:text-xl tracking-tight">PT. Gerbang NTB Emas</h1>
                <p class="text-[10px] md:text-xs text-[#F88008] font-semibold tracking-widest uppercase">Future NTB</p>
            </div>
        </a>

        {{-- MENU DESKTOP --}}
        {{-- Array menu diperbarui: Tambah Publikasi & Karir, Hapus Mitra Vendor --}}
        <nav class="hidden md:flex items-center gap-1 bg-white/5 rounded-full px-2 py-1 backdrop-blur-sm border border-white/10">
            @foreach([
                ['Home', 'home'], 
                ['About', 'about'], 
                ['Products', 'products'], 
                ['Publikasi', 'publikasi.index'], 
                ['Karir', 'karir'], 
                ['Contact', 'contact']
            ] as [$label, $route])
            <a href="{{ route($route) }}" 
               class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 
                      {{ Route::is($route) ? 'bg-[#F88008] text-white shadow-md' : 'hover:bg-white/10 text-gray-100' }}">
                {{ $label }}
            </a>
            @endforeach
        </nav>

        {{-- MOBILE MENU BUTTON --}}
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-2xl text-[#F88008] focus:outline-none transition-transform active:scale-95">
            <span x-show="!mobileMenuOpen">☰</span>
            <span x-show="mobileMenuOpen" x-cloak>✕</span>
        </button>
    </div>

    {{-- MOBILE MENU DROPDOWN --}}
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileMenuOpen = false"
         class="md:hidden absolute top-full left-0 w-full bg-[#334168] border-t border-white/10 shadow-xl"
         x-cloak>
        
        <div class="flex flex-col p-4 space-y-2">
            @foreach([
                ['Home', 'home'], 
                ['About', 'about'], 
                ['Products', 'products'], 
                ['Publikasi', 'publikasi.index'], 
                ['Karir', 'karir'], 
                ['Contact', 'contact']
            ] as [$label, $route])
            <a href="{{ route($route) }}" 
               class="block px-4 py-3 rounded-lg text-sm font-medium transition-colors
                      {{ Route::is($route) ? 'bg-[#F88008] text-white' : 'text-gray-200 hover:bg-white/10' }}">
                {{ $label }}
            </a>
            @endforeach
        </div>
    </div>

</header>