<x-app-layout :title="'Kelola Produk: '.$product->name">
    <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center gap-5">
            <a href="{{ route('admin.sectors.show', $product->sector_id) }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">{{ $product->name }}</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-black rounded-full border border-blue-100 uppercase tracking-widest">
                        {{ $product->sector->name }}
                    </span>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Panel Manajemen Produk</p>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.products.edit', $product) }}"
           class="flex items-center gap-2 bg-white border-2 border-gray-100 hover:border-blue-600 hover:text-blue-600 px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-sm active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Edit Informasi Dasar
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <a href="{{ route('admin.products.images.index', $product) }}"
           class="group bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-300">
            <div class="mb-6 flex justify-between items-start">
                <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-blue-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <svg class="w-6 h-6 text-gray-200 group-hover:text-blue-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"/></svg>
            </div>
            <h3 class="font-black text-gray-800 text-lg uppercase tracking-tight group-hover:text-blue-600 transition-colors">Kelola Gambar</h3>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-2 leading-relaxed">Upload galeri, set foto utama, & hapus aset visual.</p>
        </a>

        <a href="{{ route('admin.products.types.index', $product) }}"
           class="group bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300">
            <div class="mb-6 flex justify-between items-start">
                <div class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-emerald-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <svg class="w-6 h-6 text-gray-200 group-hover:text-emerald-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"/></svg>
            </div>
            <h3 class="font-black text-gray-800 text-lg uppercase tracking-tight group-hover:text-emerald-500 transition-colors">Kelola Jenis</h3>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-2 leading-relaxed">Atur spesifikasi model (Dadu, Hexagon, Bata, dll).</p>
        </a>

        <a href="{{ route('admin.products.prices.index', $product) }}"
           class="group bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300">
            <div class="mb-6 flex justify-between items-start">
                <div class="p-4 bg-amber-50 text-amber-600 rounded-2xl group-hover:bg-amber-500 group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-amber-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <svg class="w-6 h-6 text-gray-200 group-hover:text-amber-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"/></svg>
            </div>
            <h3 class="font-black text-gray-800 text-lg uppercase tracking-tight group-hover:text-amber-500 transition-colors">Kelola Harga</h3>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-2 leading-relaxed">Hubungkan item dengan master harga pusat.</p>
        </a>

    </div>

    <div class="mt-12 p-8 bg-gray-50 rounded-[2.5rem] border border-gray-100">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
            <div>
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] block mb-1">Status Sinkronisasi</span>
                <p class="text-sm font-bold text-gray-600">Terakhir diperbarui: {{ $product->updated_at->diffForHumans() }}</p>
            </div>
            <div class="flex gap-4">
                 <span class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-gray-400">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span> Gambar: {{ $product->images_count ?? 0 }}
                 </span>
                 <span class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-gray-400">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Jenis: {{ $product->types_count ?? 0 }}
                 </span>
            </div>
        </div>
    </div>
</x-app-layout>