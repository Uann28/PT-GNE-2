@extends('user.layout.app')

@section('title', 'Tentang Kami - PT Gerbang NTB Emas')

@section('content')

{{-- 1. HERO SECTION --}}
<section class="pt-32 pb-20 bg-[#334168] text-white text-center rounded-b-[2rem] md:rounded-b-[3rem] shadow-xl relative overflow-hidden">
    {{-- Pattern Background --}}
    <div class="absolute inset-0 opacity-10" 
         style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;">
    </div>
    
    <div class="relative z-10 px-6">
        <div data-aos="fade-down">
            <span class="inline-block py-1 px-3 rounded-full bg-[#F88008]/20 border border-[#F88008] text-[#F88008] text-xs font-bold uppercase tracking-widest mb-4">
                Profil Perusahaan
            </span>
        </div>

        {{-- Judul --}}
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight" data-aos="zoom-in" data-aos-delay="200">
            Membangun Integritas <br> <span class="text-[#F88008]">Untuk NTB Gemilang</span>
        </h1>

        {{-- Deskripsi --}}
        <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="400">
            PT Gerbang NTB Emas (GNE) adalah BUMD yang bergerak di sektor strategis manufaktur dan konstruksi untuk mendukung percepatan pembangunan daerah.
        </p>
    </div>
</section>

{{-- 2. COMPANY OVERVIEW --}}
<section class="py-20 bg-white overflow-hidden"> {{-- overflow-hidden penting untuk animasi slide --}}
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
        
        {{-- Text Content --}}
        <div class="order-2 md:order-1" data-aos="fade-right">
            <h2 class="text-3xl md:text-4xl font-bold text-[#334168] mb-6">
                Mengenal Lebih Dekat <br> PT. Gerbang NTB Emas
            </h2>
            <div class="space-y-4 text-gray-600 leading-relaxed text-justify">
                <p>
                    PT Gerbang NTB Emas (GNE) merupakan Badan Usaha Milik Daerah (BUMD) Provinsi Nusa Tenggara Barat yang bertransformasi menjadi entitas bisnis modern. Kami fokus pada sektor <strong>manufaktur beton pracetak</strong> dan <strong>jasa konstruksi</strong>.
                </p>
                <p>
                    Dengan komitmen terhadap kualitas dan inovasi, GNE hadir untuk memenuhi kebutuhan infrastruktur daerah, mulai dari proyek pemerintah skala besar hingga kebutuhan pembangunan swasta dan perumahan masyarakat.
                </p>
            </div>
            
            <div class="mt-8 grid grid-cols-2 gap-6">
                <div class="border-l-4 border-[#F88008] pl-4" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-2xl font-bold text-[#334168]">1957</h4>
                    <p class="text-sm text-gray-500">Tahun Berdiri</p>
                </div>
                <div class="border-l-4 border-[#F88008] pl-4" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-2xl font-bold text-[#334168]">+</h4>
                    <p class="text-sm text-gray-500">Tenaga Ahli</p>
                </div>
            </div>
        </div>

        {{-- Image --}}
        <div class="order-1 md:order-2 relative" data-aos="fade-left">
            <div class="absolute -top-4 -right-4 w-32 h-32 bg-[#F88008]/10 rounded-full blur-2xl"></div>
            <div class="grid grid-cols-2 gap-4 relative z-10">
                <img src="{{ asset('images/kantor-depan-gne.png')}}" class="rounded-2xl shadow-lg object-cover h-64 w-full transform translate-y-8" alt="Office">
                <img src="{{ asset('images/kantor-depan-gne.png')}}" class="rounded-2xl shadow-lg object-cover h-64 w-full" alt="Site">
            </div>
        </div>

    </div>
</section>

{{-- 3. VISION & MISSION --}}
<section class="py-20 bg-gray-50 relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute top-0 left-0 w-full h-1/2 bg-[#334168] rounded-b-[3rem]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16 text-white" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold">Visi & Misi</h2>
            <p class="text-gray-300 mt-2">Arah dan tujuan strategis perusahaan.</p>
        </div>

        <div class="grid md:grid-cols-12 gap-8">
            {{-- VISI CARD --}}
            <div class="md:col-span-4 bg-white rounded-3xl p-8 shadow-xl border-t-8 border-[#F88008] flex flex-col justify-center text-center hover:transform hover:-translate-y-1 transition duration-300"
                 data-aos="fade-right" data-aos-delay="100">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">🔭</div>
                <h3 class="text-2xl font-bold text-[#334168] mb-4">Visi</h3>
                <p class="text-gray-600 leading-relaxed font-medium">
                    "Menjadi Perusahaan yang Transparan, Kompetitif dan Terpercaya dalam mendorong Industrialisasi Pembangunan NTB."
                </p>
            </div>

            {{-- MISI CARD --}}
            <div class="md:col-span-8 bg-white rounded-3xl p-8 shadow-xl border-t-8 border-[#334168] hover:transform hover:-translate-y-1 transition duration-300"
                 data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-3xl">🚀</div>
                    <h3 class="text-2xl font-bold text-[#334168]">Misi Perusahaan</h3>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- List Misi: Muncul satu per satu (Staggered) --}}
                    <ul class="space-y-4">
                        <li class="flex gap-3 text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="300">
                            <span class="text-[#F88008] font-bold">01.</span>
                            Menyediakan Manajemen Tata Kelola Perusahaan yang Kompeten, Sistematis dan Profesional.
                        </li>
                        <li class="flex gap-3 text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="400">
                            <span class="text-[#F88008] font-bold">02.</span>
                            Mengembangankan (Inovasi) Bisnis berbasis Konstruksi berdasarkan Potensi Daerah dan Peluang Pasar.
                        </li>
                        <li class="flex gap-3 text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="500">
                            <span class="text-[#F88008] font-bold">03.</span>
                            Meningkatkan Produktivitas Perusahaan melalui: Optimalisasi Kapasitas Produksi, Pengembangan Variasi dan Kualitas Produk, Peningkatan Pendapatan Penjualan dan Keuntungan Perusahaan serta Kontribusi terhadap Deviden.
                        </li>
                    </ul>
                    <ul class="space-y-4">
                        <li class="flex gap-3 text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="600">
                            <span class="text-[#F88008] font-bold">04.</span>
                            Memperluas Jaringan Pemasaran dan Distribusi yang terintegrasi.
                        </li>
                        <li class="flex gap-3 text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="700">
                            <span class="text-[#F88008] font-bold">05.</span>
                            Mewujudkan kemandirian Manajemen Keuangan Perusahaan sehingga mampu meningkatkan kesejahteraan Karyawan dan Stakeholder Perusahaan.
                        </li>
                        <li class="flex gap-3 text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="800">
                            <span class="text-[#F88008] font-bold">06.</span>
                            Membangun jaringan distribusi ritel & grosir hingga ke pelosok desa di NTB.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4. HISTORY --}}
<section class="py-20 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6">
        
        {{-- Header Section --}}
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-[#F88008] font-bold uppercase tracking-wider text-sm">Perjalanan Kami</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#334168] mt-2">Sejarah & Transformasi</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Perusahaan telah berdiri sejak tahun 1957, mengalami berbagai dinamika perubahan bentuk badan usaha hingga menjadi entitas yang profesional saat ini.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
            
            {{-- COLUMN 1: TIMELINE (Sejarah Perubahan Nama) --}}
            <div class="relative">
                <h3 class="text-xl font-bold text-[#334168] mb-8 flex items-center gap-2">
                    <span class="w-8 h-1 bg-[#F88008] rounded-full"></span>
                    Jejak Langkah
                </h3>

                <div class="border-l-2 border-gray-200 ml-3 md:ml-4 space-y-10">
                    @php
                        $histories = [
                            ['1957', 'Awal Pendirian', 'Departemen Perindustrian membentuk <strong>Induk Pande Besi Lombok</strong> di Mataram.'],
                            ['1961', 'Status PNPR', 'Berubah menjadi Perusahaan Negara Perindustrian Rakyat (PNPR) <strong>Wisaya Yasa</strong>.'],
                            ['1969', 'Status Perusahaan Daerah', 'Menjadi Perusahaan Daerah (PD) Tingkat 1 <strong>Unit Logam</strong>.'],
                            ['1980', 'Otonomi Daerah', 'Berstatus otonomi dengan nama Perusahaan Daerah (PD) <strong>Wisaya Yasa</strong>.'],
                            ['2006', 'Identitas Baru', 'Resmi bertransformasi menjadi <strong>PT. Gerbang NTB Emas (PERSERODA)</strong> hingga saat ini.']
                        ];
                    @endphp

                    @foreach($histories as $h)
                    <div class="relative pl-8 md:pl-10 group" data-aos="fade-right" data-aos-delay="{{ $loop->iteration * 100 }}">
                        {{-- Dot Indicator --}}
                        <div class="absolute -left-[9px] top-1 w-5 h-5 rounded-full bg-white border-4 border-[#334168] group-hover:border-[#F88008] group-hover:scale-110 transition-all duration-300"></div>
                        
                        {{-- Content --}}
                        <div class="flex flex-col sm:flex-row sm:gap-6 items-start">
                            <span class="text-2xl font-black text-[#F88008] bg-orange-50 px-2 rounded sm:w-20 flex-shrink-0 leading-none py-1">{{ $h[0] }}</span>
                            <div>
                                <h4 class="text-lg font-bold text-[#334168] mb-1">{{ $h[1] }}</h4>
                                <p class="text-gray-600 text-sm leading-relaxed border-b border-gray-100 pb-4 group-last:border-0">{!! $h[2] !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- COLUMN 2: DESCRIPTION & LEGALITY (Detail Tambahan) --}}
            <div class="space-y-8 lg:sticky lg:top-24">
                
                {{-- Card 1: Mandat & Tujuan --}}
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 shadow-sm" data-aos="fade-left" data-aos-delay="200">
                    <div class="w-12 h-12 bg-[#334168] rounded-xl flex items-center justify-center text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#334168] mb-3">Mandat & Peran Strategis</h3>
                    <p class="text-gray-600 leading-relaxed text-sm text-justify">
                        PT. Gerbang NTB Emas (Perseroda) merupakan BUMD milik Pemerintah Daerah Provinsi NTB yang bergerak di bidang aneka usaha.
                        <br><br>
                        Kami diamanatkan untuk menjalankan fungsi dan tanggung jawab dalam pengembangan perekonomian daerah, membantu mendorong pertumbuhan ekonomi, serta pemerataan hasil pembangunan di NTB guna memberikan kontribusi PAD yang memadai bagi Daerah.
                    </p>
                </div>

                {{-- Card 2: Legalitas (Highlighted) --}}
                <div class="bg-gradient-to-br from-[#334168] to-[#1e2a4a] rounded-2xl p-8 text-white shadow-lg relative overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                    {{-- Decorative Circle --}}
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-white opacity-5 rounded-full pointer-events-none"></div>

                    <h3 class="text-lg font-bold border-b border-white/20 pb-3 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#F88008]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Landasan Hukum Pendirian
                    </h3>
                    
                    <ul class="space-y-4 text-sm text-gray-200">
                        <li class="flex gap-3">
                            <span class="mt-1 text-[#F88008]">•</span>
                            <span>
                                <strong class="text-white block">Peraturan Daerah</strong>
                                Perda No. 2 Tahun 2006.
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1 text-[#F88008]">•</span>
                            <span>
                                <strong class="text-white block">Akta Pendirian</strong>
                                Akta Notaris No. 01 tanggal 5 April 2007, oleh Notaris Ermi Purnamasari SH. MKn, di Mataram.
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1 text-[#F88008]">•</span>
                            <span>
                                <strong class="text-white block">Pengesahan Kemenkumham</strong>
                                No. W24-00044 HT.01.01 – TH.2007 (Tanggal 16 Mei 2007).
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- 5. BOARD OF DIRECTORS --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-[#334168] mb-12" data-aos="fade-up">Jajaran Direksi</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-center">
            @foreach(range(1,3) as $i)
            {{-- Card Direksi: Zoom In bergantian --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition group" 
                 data-aos="zoom-in" data-aos-delay="{{ $i * 150 }}">
                
                <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden border-4 border-white shadow-lg">
                    <img src="https://source.unsplash.com/random/200x200?man={{$i}}" alt="Director" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition">
                </div>
                <h3 class="text-lg font-bold text-[#334168]">Nama Direksi {{$i}}</h3>
                <p class="text-[#F88008] text-sm font-medium uppercase tracking-wide">Jabatan</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 6. ORGANIZATION STRUCTURE --}}
<section class="py-10 bg-white border-t border-gray-100">
    <div class="max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-[#334168] mb-8">Struktur Organisasi</h2>
        <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-3xl p-12 flex flex-col items-center justify-center min-h-[400px]" data-aos="zoom-in" data-aos-delay="200">
            <img src="/images/strukturOrganisasi.jpg" alt="Struktur Organisasi" class="w-full h-full object-cover">
        </div>
    </div>
</section>

@endsection