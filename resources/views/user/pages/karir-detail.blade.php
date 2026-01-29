@extends('user.layout.app')

@section('title', 'Staf Akuntansi - Karir GNE')

@section('content')

{{-- HEADER / BREADCRUMB --}}
<div class="pt-32 pb-10 bg-[#334168] text-white">
    <div class="max-w-6xl mx-auto px-6">
        <a href="{{-- route('career.index') --}}" class="inline-flex items-center gap-2 text-gray-300 hover:text-white text-sm mb-6 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Karir
        </a>
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div>
                <span class="inline-block px-3 py-1 bg-[#F88008] text-white text-xs font-bold rounded-full mb-3">FULL TIME</span>
                <h1 class="text-3xl md:text-5xl font-bold mb-2">Staf Akuntansi & Keuangan</h1>
                <p class="text-gray-300 flex items-center gap-2 text-sm md:text-base">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /> </svg>
                    Divisi Keuangan
                    <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                    Mataram, NTB
                </p>
            </div>
        </div>
    </div>
</div>

{{-- CONTENT --}}
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-8 md:gap-12">
            
            {{-- LEFT COLUMN: DETAILS --}}
            <div class="lg:col-span-2 space-y-8">
                
                {{-- Deskripsi --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-[#334168] mb-4 border-b border-gray-100 pb-2">Deskripsi Pekerjaan</h3>
                    <p class="text-gray-600 leading-relaxed text-justify">
                        Kami mencari Staf Akuntansi yang teliti dan berdedikasi untuk bergabung dengan tim keuangan kami. Anda akan bertanggung jawab untuk mengelola pencatatan keuangan harian, menyusun laporan keuangan bulanan, dan memastikan kepatuhan terhadap standar akuntansi yang berlaku. Kandidat yang ideal memiliki pemahaman kuat tentang prinsip akuntansi dan mampu bekerja dengan deadline yang ketat.
                    </p>
                </div>

                {{-- Tanggung Jawab --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-[#334168] mb-4 border-b border-gray-100 pb-2">Tanggung Jawab Utama</h3>
                    <ul class="space-y-3">
                        @foreach(['Melakukan pencatatan transaksi keuangan harian.', 'Menyusun laporan laba rugi, neraca, dan arus kas bulanan.', 'Melakukan rekonsiliasi bank dan akun lainnya.', 'Mengelola pembayaran pajak bulanan dan tahunan.', 'Berkoordinasi dengan auditor eksternal saat diperlukan.'] as $item)
                        <li class="flex items-start gap-3 text-gray-600">
                            <svg class="w-5 h-5 text-[#F88008] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Kualifikasi --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-[#334168] mb-4 border-b border-gray-100 pb-2">Kualifikasi</h3>
                    <ul class="space-y-3">
                        @foreach(['Pendidikan minimal S1 Akuntansi / Keuangan.', 'Pengalaman kerja minimal 2 tahun di bidang terkait.', 'Menguasai software akuntansi (Zahir/Accurate/SAP) dan Microsoft Excel.', 'Memiliki sertifikasi Brevet A & B menjadi nilai tambah.', 'Jujur, teliti, dan memiliki integritas tinggi.'] as $item)
                        <li class="flex items-start gap-3 text-gray-600">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#334168] mt-2 flex-shrink-0"></div>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            {{-- RIGHT COLUMN: SIDEBAR (Sticky) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    
                    {{-- Summary Card --}}
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Ringkasan</h4>
                        
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between border-b border-gray-50 pb-2">
                                <span class="text-gray-500">Departemen</span>
                                <span class="font-medium text-[#334168] text-right">Keuangan & Akuntansi</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 pb-2">
                                <span class="text-gray-500">Tipe Pekerjaan</span>
                                <span class="font-medium text-[#334168] text-right">Full Time</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 pb-2">
                                <span class="text-gray-500">Pengalaman</span>
                                <span class="font-medium text-[#334168] text-right">Min. 2 Tahun</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 pb-2">
                                <span class="text-gray-500">Batas Lamaran</span>
                                <span class="font-medium text-red-500 text-right">30 Juni 2024</span>
                            </div>
                        </div>

                        {{-- Apply Button --}}
                        <div class="mt-8">
                            <a href="mailto:hrd@gne.co.id?subject=Lamaran Staf Akuntansi - [Nama Anda]" 
                               class="block w-full text-center py-4 bg-[#F88008] hover:bg-[#d66e06] text-white font-bold rounded-xl shadow-lg shadow-orange-500/20 transition-transform hover:-translate-y-1">
                                Lamar Sekarang
                            </a>
                            <p class="text-xs text-gray-400 text-center mt-3">
                                Atau kirim CV ke <span class="text-[#334168] font-bold">hrd@gne.co.id</span>
                            </p>
                        </div>
                    </div>

                    {{-- Help Card --}}
                    <div class="bg-[#334168] p-6 rounded-2xl text-white text-center shadow-lg relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                        <h4 class="font-bold mb-2">Butuh Bantuan?</h4>
                        <p class="text-sm text-gray-300 mb-4">Jika Anda mengalami kendala saat melamar, hubungi tim HR kami.</p>
                        <a href="https://wa.me/62812345678" class="text-[#F88008] font-bold text-sm hover:underline">Chat WhatsApp HR</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection