@extends('user.layout.app')

@section('title', 'Karir & Rekrutmen - PT Gerbang NTB Emas')

@section('content')

{{-- 1. HERO SECTION --}}
<section class="pt-32 pb-24 bg-[#334168] text-white text-center rounded-b-[3rem] shadow-2xl relative overflow-hidden">
    {{-- Background Accents --}}
    <div class="absolute top-0 right-0 w-full h-full overflow-hidden z-0 opacity-20">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#F88008] rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    </div>
    
    <div class="relative z-10 px-6 max-w-4xl mx-auto">
        <div data-aos="fade-down">
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white/10 border border-white/20 text-[#F88008] text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-sm">
                Informasi Publik
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight" data-aos="zoom-in" data-aos-delay="200">
            Peluang Kepemimpinan <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F88008] to-yellow-400">Direktur Utama GNE</span>
        </h1>

        <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="400">
            Sebagai BUMD kebanggaan Nusa Tenggara Barat, kami mengundang talenta terbaik untuk memimpin inovasi produk beton pracetak dan layanan konstruksi yang unggul.
        </p>
    </div>
</section>

{{-- 2. MAIN CONTENT --}}
<section class="py-20 bg-gray-50 min-h-screen -mt-12 relative z-20">
    <div class="max-w-5xl mx-auto px-6">
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100" data-aos="fade-up">
            <div class="grid md:grid-cols-12">
                
                {{-- Left Side: Image/Visual --}}
                <div class="md:col-span-5 bg-gray-100 flex items-center justify-center p-8 relative overflow-hidden">
                    <img src="{{ asset('path/to/your/image_3779ce.png') }}" alt="Rekrutmen Direktur" class="relative z-10 w-full h-auto transform hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#334168]/10 to-transparent"></div>
                </div>

                {{-- Right Side: Info --}}
                <div class="md:col-span-7 p-8 md:p-12">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-[#334168] mb-4">Rekrutmen Calon Direktur GNE</h2>
                        <div class="h-1.5 w-20 bg-[#F88008] rounded-full"></div>
                    </div>

                    <div class="prose prose-blue text-gray-600 mb-10">
                        <p class="leading-relaxed text-lg italic">
                            "Kami berkomitmen menghadirkan produk beton pracetak berkualitas tinggi dan layanan konstruksi yang mengutamakan ketepatan waktu, efisiensi biaya, dan standar keselamatan kerja."
                        </p>
                        <p class="mt-4">
                            Kami mencari pemimpin strategis yang mampu membawa PT Gerbang NTB Emas mencapai visi global dengan integritas dan profesionalisme tinggi.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                            <div class="p-2 bg-[#F88008]/10 rounded-lg">
                                <svg class="w-6 h-6 text-[#F88008]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Posisi</p>
                                <p class="font-bold text-[#334168]">Direksi</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                            <div class="p-2 bg-blue-500/10 rounded-lg">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Lokasi</p>
                                <p class="font-bold text-[#334168]">Mataram, NTB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. SIMPLE FOOTER CTA --}}
<section class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="zoom-in">
        <h3 class="text-2xl font-bold text-[#334168] mb-4">Butuh Bantuan atau Informasi Lebih Lanjut?</h3>
        <p class="text-gray-600 mb-8">Hubungi departemen SDM kami untuk pertanyaan mengenai rekrutmen direksi.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="mailto:hrd@gne.co.id" class="px-8 py-3 bg-[#334168] text-white rounded-full font-bold hover:bg-[#2a3655] transition">Email HRD</a>
            <a href="/kontak" class="px-8 py-3 border-2 border-[#334168] text-[#334168] rounded-full font-bold hover:bg-gray-50 transition">Hubungi Kami</a>
        </div>
    </div>
</section>

@endsection