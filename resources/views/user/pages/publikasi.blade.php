@extends('user.layout.app')

@section('title', 'Laporan Publikasi - PT Gerbang NTB Emas')

@section('content')

{{-- 1. HERO SECTION --}}
<section class="pt-32 pb-24 bg-[#334168] text-white text-center rounded-b-[3rem] shadow-2xl relative overflow-hidden">
    {{-- Decorative Abstract Elements --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#F88008] rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 right-0 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
    </div>
    
    {{-- Grid Pattern Overlay --}}
    <div class="absolute inset-0 z-0 opacity-10" 
         style="background-image: radial-gradient(#ffffff 1.5px, transparent 1.5px); background-size: 30px 30px;">
    </div>

    <div class="relative z-10 px-6 max-w-4xl mx-auto">
        <div data-aos="fade-down">
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white/10 border border-white/20 text-[#F88008] text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-sm shadow-lg">
                <span class="w-2 h-2 rounded-full bg-[#F88008] animate-ping"></span>
                Transparansi Publik
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight" data-aos="zoom-in" data-aos-delay="200">
            Laporan <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F88008] to-yellow-400">Publikasi</span>
        </h1>

        <p class="text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="400">
            Akses terbuka dokumen laporan keuangan dan kinerja perusahaan sebagai wujud integritas dan akuntabilitas kami.
        </p>
    </div>
</section>

{{-- 2. MAIN CONTENT --}}
<section class="py-16 md:py-24 bg-[#F8F9FA] min-h-screen relative">
    <div class="max-w-7xl mx-auto px-6 relative z-10">

        {{-- TOOLBAR (Filter) --}}
        <div class="bg-white p-2 rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 mb-10 flex flex-col md:flex-row gap-4 justify-between items-center" data-aos="fade-up">
            
            <div class="px-4 py-2 flex items-center gap-3 w-full md:w-auto border-b md:border-b-0 border-gray-100 pb-4 md:pb-0">
                <div class="w-10 h-10 rounded-xl bg-[#334168]/10 flex items-center justify-center text-[#334168]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="font-bold text-[#334168] text-lg">Arsip Dokumen</span>
            </div>

            {{-- Filter Right (Updated with Dynamic Year) --}}
            <form action="{{ route('publikasi.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2 w-full md:w-auto p-2">
                <div class="relative group">
                    <select name="tahun" class="appearance-none bg-gray-50 hover:bg-gray-100 border border-gray-200 text-gray-700 py-3 pl-5 pr-12 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F88008]/20 focus:border-[#F88008] w-full sm:w-48 font-semibold cursor-pointer transition-all">
                        <option value="">Semua Tahun</option>
                        {{-- Mengambil range tahun dari 5 tahun lalu sampai sekarang --}}
                        @foreach(range(date('Y'), date('Y')-5) as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                Tahun {{ $year }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 group-hover:text-[#F88008] transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                <button type="submit" class="bg-[#334168] hover:bg-[#2a3655] text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg shadow-[#334168]/20 flex items-center justify-center gap-2">
                    <span>Filter</span>
                </button>
            </form>
        </div>

        {{-- LIST LAPORAN (Dinamis dari Database) --}}
        <div class="space-y-5">
            
            @forelse($reports as $item)
            <div class="group relative bg-white rounded-2xl p-1 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6 p-6">
                    
                    {{-- Icon Section --}}
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-red-50 to-red-100 text-red-500 flex items-center justify-center border border-red-100 shadow-inner group-hover:scale-105 transition-transform duration-300 relative z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 drop-shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="flex-1 min-w-0 py-1">
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-md text-[10px] font-bold bg-[#334168] text-white uppercase tracking-wider">
                                PDF
                            </span>
                            <span class="flex items-center gap-1 px-3 py-1 rounded-md bg-gray-100 text-gray-500 text-xs font-bold border border-gray-200">
                                <i class="fa-regular fa-calendar text-[10px]"></i> {{ $item->year }}
                            </span>
                        </div>
                        
                        <h4 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#334168] transition-colors leading-snug">
                            {{ $item->title }}
                        </h4>
                        
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium">
                            <span class="flex items-center gap-1.5 hover:text-[#F88008] transition-colors">
                                <i class="fa-regular fa-clock text-gray-400"></i>
                                {{ $item->published_at->translatedFormat('d F Y') }}
                            </span>
                            <span class="hidden md:inline w-1 h-1 rounded-full bg-gray-300"></span>
                            <span class="flex items-center gap-1.5 hover:text-[#F88008] transition-colors">
                                <i class="fa-solid fa-hard-drive text-gray-400"></i>
                                {{ $item->file_size }}
                            </span>
                        </div>
                    </div>

                    {{-- Action Button --}}
                    <div class="w-full md:w-auto mt-2 md:mt-0 self-start md:self-center">
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="group/btn relative overflow-hidden flex items-center justify-center gap-2 w-full md:w-auto px-6 py-3.5 bg-white border border-gray-200 text-[#334168] rounded-xl font-bold transition-all duration-300 hover:border-[#F88008] hover:text-[#F88008] shadow-sm hover:shadow-md">
                            <span class="relative z-10">Unduh</span>
                            <i class="fa-solid fa-download h-4 w-4 relative z-10 transform group-hover/btn:translate-y-0.5 transition-transform"></i>
                            <div class="absolute inset-0 bg-gray-50 transform scale-x-0 group-hover/btn:scale-x-100 transition-transform origin-left duration-300 -z-0"></div>
                        </a>
                    </div>
                </div>

                <div class="absolute left-0 top-8 bottom-8 w-1.5 bg-[#F88008] rounded-r-full scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-center"></div>
            </div>
            @empty
            <div class="bg-white rounded-3xl p-20 text-center border border-dashed border-gray-200" data-aos="fade-up">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-folder-open text-gray-300 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Belum ada dokumen</h3>
                <p class="text-gray-500 mt-2">Arsip untuk kriteria yang Anda cari tidak ditemukan.</p>
            </div>
            @endforelse

        </div>

        {{-- Pagination Dinamis --}}
        <div class="mt-16 flex justify-center" data-aos="fade-up">
            {{ $reports->links('pagination::tailwind') }}
        </div>

    </div>
</section>

@endsection