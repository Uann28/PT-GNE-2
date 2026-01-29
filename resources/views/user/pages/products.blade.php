@extends('user.layout.app')

@section('title', 'Katalog Produk - PT Gerbang NTB Emas')

@section('content')

{{-- COMPACT HERO --}}
<section class="pt-32 pb-16 bg-[#334168] text-white text-center rounded-b-[3rem] shadow-xl relative overflow-hidden">
    {{-- Pattern Background --}}
    <div class="absolute inset-0 opacity-10" 
         style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;">
    </div>
    
    <div class="relative z-10 px-6">
        {{-- Badge --}}
        <div data-aos="fade-down">
            <span class="inline-block py-1 px-3 rounded-full bg-[#F88008]/20 border border-[#F88008] text-[#F88008] text-xs font-bold uppercase tracking-widest mb-4">
                Produk
            </span>
        </div>

        {{-- Judul --}}
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3 tracking-tight" data-aos="zoom-in" data-aos-delay="200">
            Katalog & Spesifikasi
        </h1>

        {{-- Deskripsi --}}
        <p class="text-gray-300 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="400">
            Daftar lengkap produk kami.
        </p>
    </div>
</section>

{{-- MAIN SECTION --}}
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        
        {{-- 1. CONTAINER TABS (SECTOR) --}}
        <div class="w-full overflow-x-auto pb-2 scrollbar-hide text-center" data-aos="fade-down">
            <div id="sector-tabs-container" class="inline-flex p-1 gap-2 rounded-lg w-fit mx-auto">
                {{-- JS akan mengisi ini --}}
            </div>
        </div>

        <div class="grid lg:grid-cols-[280px_1fr] gap-8 items-start mt-8">
            
            {{-- 2. CONTAINER SIDEBAR --}}
            <aside class="hidden lg:block sticky top-28 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Daftar Produk</h3>
                    <div id="sidebar-list-container" class="space-y-1">
                        {{-- JS akan mengisi ini --}}
                    </div>
                </div>
                {{-- Widget Kontak --}}
                <div class="bg-gradient-to-br from-[#F88008] to-orange-600 text-white p-6 rounded-2xl shadow-lg shadow-orange-500/30 text-center relative overflow-hidden" 
                     data-aos="zoom-in" data-aos-delay="800">
                    <div class="absolute top-0 right-0 p-4 opacity-10 text-4xl">📞</div>
                    <p class="text-sm font-semibold mb-4 relative z-10">Konsultasi sekarang?</p>
                    <a href="{{ route('contact') }}" class="inline-block w-full bg-white text-[#F88008] font-bold py-3 rounded-xl hover:bg-gray-50 transition relative z-10 shadow-sm">
                        Hubungi Kami
                    </a>
                </div>
            </aside>

            {{-- 3. MAIN CONTENT --}}
            <div class="min-w-0"> 
                {{-- Mobile Dropdown --}}
                <div class="lg:hidden mb-6">
                    <label class="text-xs font-bold text-gray-500 mb-2 block uppercase tracking-wide">Pilih Produk:</label>
                    <select id="mobile-product-select" class="w-full p-3 rounded-xl border-gray-300 shadow-sm"></select>
                </div>

                {{-- CANVAS UTAMA --}}
                <main id="main-content-canvas" class="min-h-[500px]">
                    <div class="flex flex-col items-center justify-center h-64 text-gray-400 animate-pulse">
                        <span class="text-3xl mb-2">📦</span>
                        <span>Memuat Katalog...</span>
                    </div>
                </main>
            </div>
        </div>
    </div>
</section>

{{-- INFORMASI PENGIRIMAN --}}
<section class="bg-white border-t border-gray-200 py-16 overflow-hidden">
  <div class="mx-auto max-w-7xl px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        
        {{-- Kiri: Teks Info --}}
        <div data-aos="fade-right">
            <h2 class="text-2xl font-bold text-[#334168] mb-4">Informasi Pengiriman</h2>
            <p class="text-gray-600 mb-6">Kami melayani pengiriman ke seluruh wilayah Nusa Tenggara Barat dengan armada truck crane untuk memudahkan penurunan barang di lokasi proyek.</p>
            
            <div class="space-y-4">
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-[#F88008] p-2 rounded-full text-white">🚚</div>
                    <div>
                        <h4 class="font-bold text-[#334168]">Gratis Ongkir Mataram</h4>
                        <p class="text-xs text-gray-500">Syarat & ketentuan berlaku</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-[#F88008] p-2 rounded-full text-white">💳</div>
                    <div>
                        <h4 class="font-bold text-[#334168]">Pembayaran Fleksibel</h4>
                        <p class="text-xs text-gray-500">Tunai atau Transfer Bank NTB/Mandiri</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kanan: Tabel Harga --}}
        <div class="bg-gray-900 text-white p-6 rounded-2xl" data-aos="fade-left" data-aos-delay="200">
            <h4 class="font-bold mb-4 border-b border-gray-700 pb-2">Estimasi Biaya Kirim / m²</h4>
            <table class="w-full text-sm">
                <tbody class="divide-y divide-gray-700">
                    <tr><td class="py-2">Mataram</td><td class="py-2 text-right font-bold text-[#F88008]">Gratis</td></tr>
                    <tr><td class="py-2">Lombok Barat/Tengah</td><td class="py-2 text-right">Rp 10.000 - 20.000</td></tr>
                    <tr><td class="py-2">Lombok Timur/Utara</td><td class="py-2 text-right">Rp 15.000 - 35.000</td></tr>
                    <tr><td class="py-2">Sumbawa (Area)</td><td class="py-2 text-right">Hubungi Kami</td></tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
    window.SECTOR_DATA = @json($sectorData);
</script>

{{-- GANTI dengan ini: --}}
@vite('resources/js/products.js') 

@endpush