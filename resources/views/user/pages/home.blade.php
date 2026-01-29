@extends('user.layout.app')

@section('title', 'Home - PT Gerbang NTB Emas')

@section('content')

{{-- 1. HERO SECTION --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-[#334168]">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-[#1e293b] via-[#334168]/90 to-[#F88008]/20"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 text-center pt-20">
        <div data-aos="fade-down">
            <span class="inline-block py-1 px-3 rounded-full bg-[#F88008]/20 border border-[#F88008] text-[#F88008] text-xs font-bold uppercase tracking-widest mb-6">
                BUMD Provinsi NTB
            </span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight tracking-tight mb-6 drop-shadow-lg" data-aos="zoom-in" data-aos-delay="200">
            Membangun Negeri <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F88008] to-yellow-400">
                Dari Nusa Tenggara
            </span>
        </h1>

        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="400">
            Menyediakan produk manufaktur beton pracetak dan layanan konstruksi terintegrasi untuk infrastruktur masa depan.
        </p>

        <div class="flex flex-col md:flex-row gap-4 justify-center items-center" data-aos="fade-up" data-aos-delay="600">
            <a href="{{ route('products') }}" class="px-8 py-4 bg-[#F88008] hover:bg-[#d66e06] text-white rounded-xl font-bold text-lg shadow-lg shadow-orange-500/30 transition transform hover:-translate-y-1">
                Lihat Katalog Produk 🏗️
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white rounded-xl font-semibold transition">
                Hubungi Kami
            </a>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-16 md:h-24 text-gray-50" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="currentColor"></path>
        </svg>
    </div>
</section>

{{-- 2. STATS SECTION --}}
<section class="relative -mt-16 z-20 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['+', 'Tahun Berdiri', '🏛️'],
            ['+', 'Karyawan Profesional', '👷'],
            ['+', 'Proyek Selesai', '🏗️'],
            ['+', 'Wilayah Distribusi', '🚚']
        ] as [$num, $label, $icon])
        <div class="bg-white p-6 rounded-2xl shadow-xl border-b-4 border-[#F88008] hover:transform hover:-translate-y-2 transition duration-300 text-center group"
             data-aos="fade-up" 
             data-aos-delay="{{ $loop->iteration * 100 }}">
            
            <div class="text-4xl mb-3 grayscale group-hover:grayscale-0 transition">{{ $icon }}</div>
            <h3 class="text-3xl font-extrabold text-[#334168]">{{ $num }}</h3>
            <p class="text-xs md:text-sm font-semibold text-gray-500 uppercase tracking-wide mt-1">{{ $label }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- 3. ABOUT SNIPPET --}}
<section class="py-24 bg-gray-50 overflow-hidden"> 
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
        <div class="relative" data-aos="fade-right">
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-[#F88008] rounded-full opacity-20 blur-xl"></div>
            <div class="relative z-10 grid grid-cols-2 gap-4">
                <img src="/images/home/2.jpg" alt="gambar paving" class="rounded-2xl h-64 w-full shadow-lg object-cover">
                <img src="/images/home/1.jpg" alt="kantor GNE" class="rounded-2xl h-64 w-full shadow-lg mt-12">
            </div>
        </div>

        <div data-aos="fade-left">
            <span class="text-[#F88008] font-bold uppercase tracking-wider text-sm">Tentang GNE</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#334168] mt-3 mb-6">Mitra Strategis Pembangunan Infrastruktur NTB</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Sebagai BUMD kebanggaan Nusa Tenggara Barat, kami berkomitmen menghadirkan produk beton pracetak berkualitas tinggi dan layanan konstruksi yang mengutamakan ketepatan waktu, efisiensi biaya, dan standar keselamatan kerja.
            </p>
            
            <ul class="space-y-3 mb-8">
                @foreach(['Berstandar SNI', 'Material Pilihan', 'Harga Kompetitif'] as $item)
                <li class="flex items-center gap-3 text-[#334168] font-medium" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    <span class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">✓</span>
                    {{ $item }}
                </li>
                @endforeach
            </ul>

            <a href="{{ route('about') }}" class="text-[#334168] font-bold border-b-2 border-[#F88008] hover:text-[#F88008] transition pb-1">Pelajari Lebih Lanjut &rarr;</a>
        </div>
    </div>
</section>

{{-- 4. WHY CHOOSE US --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div data-aos="fade-up">
            <span class="text-[#F88008] font-bold uppercase tracking-wider text-sm">Kenapa Memilih Kami</span>
            <h2 class="text-3xl font-bold text-[#334168] mt-2 mb-16">Keunggulan Layanan Kami</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
            @php
                $reasons = [
                    ['🏗️', 'Produk Presisi', 'Dicetak dengan teknologi hidrolik modern menjamin kepadatan dan ukuran presisi.'],
                    ['🤝', 'Mitra Terpercaya', 'Telah bekerjasama dengan berbagai kontraktor besar dan dinas pemerintahan.'],
                    ['🚚', 'Logistik Handal', 'Armada pengiriman lengkap menjangkau seluruh pulau Lombok dan Sumbawa.'],
                    ['🛡️', 'Garansi Kualitas', 'Jaminan mutu beton sesuai dengan spesifikasi K (Karakteristik) yang diminta.']
                ];
            @endphp
            @foreach($reasons as [$icon, $title, $desc])
            <div class="p-8 rounded-3xl bg-gray-50 hover:bg-[#334168] hover:text-white transition group duration-500 cursor-default"
                 data-aos="zoom-in" 
                 data-aos-delay="{{ $loop->iteration * 100 }}">
                
                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-2xl shadow-sm mb-6 mx-auto group-hover:scale-110 transition">{{ $icon }}</div>
                <h3 class="text-xl font-bold mb-3">{{ $title }}</h3>
                <p class="text-sm text-gray-500 group-hover:text-gray-300">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 5. PRODUCTS & SERVICES SHOWCASE --}}
<section class="bg-[#334168] py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 p-12 opacity-5 text-white animate-spin-slow">
        <svg width="200" height="200" viewBox="0 0 200 200"><path d="M0 0h200v200H0z" fill="none"/><path d="M0 0l200 200M200 0L0 200" stroke="currentColor" stroke-width="2"/></svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-10 gap-6 text-center md:text-left relative">
            <div class="flex-shrink-0 z-20" data-aos="fade-right">
                <span class="text-[#F88008] font-bold uppercase tracking-wider text-sm">Katalog Produk</span>
                <h2 class="text-3xl font-bold text-white mt-2">Solusi & Layanan Kami</h2>
            </div>

            <div class="w-full md:w-auto md:max-w-[65%] min-w-0 z-20" data-aos="fade-left">
                <div id="home-tabs-wrapper" class="flex flex-nowrap overflow-x-auto bg-[#2b385a] p-2 rounded-xl gap-2 scrollbar-hide shadow-lg w-fit mx-auto">
                </div>
            </div>
        </div>

        <div id="home-content-wrapper" class="min-h-[300px]" data-aos="fade-up" data-aos-delay="200"></div>

        <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('products') }}" class="text-gray-300 hover:text-white text-sm border-b border-gray-500 pb-1 hover:border-white transition">Lihat Seluruh Katalog & Layanan</a>
        </div>
    </div>
</section>

{{-- 6. LATEST NEWS SECTION --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12" data-aos="fade-up">
            <div>
                <span class="text-[#F88008] font-bold uppercase tracking-wider text-sm">Berita & Artikel</span>
                <h2 class="text-3xl font-bold text-[#334168] mt-2">Kabar Terbaru GNE</h2>
            </div>
            <a href="{{ route('user.pages.information.index') }}" class="hidden md:inline-flex items-center gap-2 text-[#334168] font-bold hover:text-[#F88008] transition">Lihat Berita Lainnya →</a>
        </div>

        {{-- NEWS CONTAINER --}}
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($information as $news)
                <article class="bg-white rounded-xl overflow-hidden shadow">
                    <img src="{{ asset('storage/'.$news->image) }}"
                        class="h-48 w-full object-cover">

                    <div class="p-5">
                        <p class="text-xs text-gray-500 mb-2">
                            {{ ($news->published_at)->format('d M Y') }}
                        </p>

                        <h3 class="font-bold text-[#334168] line-clamp-2">
                            {{ $news->title }}
                        </h3>

                        <a href="{{ route('user.pages.information.show', $news->slug) }}"
                        class="inline-block mt-3 text-[#F88008] font-bold text-sm">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>


        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('user.pages.information.index') }}" class="inline-block border border-[#334168] text-[#334168] px-6 py-2 rounded-full font-bold text-sm">Lihat Semua Berita</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // === JEMBATAN DATA ===
    // Kita simpan data dari PHP ke Window agar bisa dibaca file JS eksternal
    window.SECTORS_DATA = @json($sectorsData); 
</script>

{{-- Panggil file JS eksternal --}}
{{-- Jika pakai Vite: --}}
@vite('resources/js/home.js') 

{{-- ATAU Jika file ada di public/js manual: --}}
{{-- <script src="{{ asset('js/home.js') }}"></script> --}}
@endpush