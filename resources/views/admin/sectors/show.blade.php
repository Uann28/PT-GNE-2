<x-app-layout :title="'Sektor: '.$sector->name">
    <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center gap-5">
            <a href="{{ route('admin.sectors.index') }}" 
               class="p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-blue-600 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">{{ $sector->name }}</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Manajemen Inventaris Produk</p>
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-black rounded-full border border-blue-100 uppercase">
                        {{ $sector->products->count() }} Total
                    </span>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.sectors.products.create', $sector) }}"
           class="flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3.5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-emerald-100 transition-all active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Produk
        </a>
    </div>

    @if($sector->description)
    <div class="mb-8 p-6 bg-white rounded-[2rem] border border-gray-100 shadow-sm flex items-start gap-4">
        <div class="p-3 bg-gray-50 text-gray-400 rounded-xl">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-1">Deskripsi Sektor</span>
            <p class="text-sm text-gray-600 font-medium leading-relaxed italic">"{{ $sector->description }}"</p>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-50">
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nama Produk</th>
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                    <th class="px-8 py-5 text-right text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Opsi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($sector->products as $product)
                <tr class="group hover:bg-blue-50/30 transition-all duration-300">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 font-bold text-xs">
                                {{ substr($product->name, 0, 1) }}
                            </div>
                            <span class="font-bold text-gray-800 tracking-tight group-hover:text-blue-600 transition-colors">
                                {{ $product->name }}
                            </span>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="flex items-center gap-1.5 text-[10px] font-black uppercase text-emerald-500">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <a href="{{ route('admin.products.show', $product) }}"
                           class="inline-flex items-center gap-2 bg-gray-50 group-hover:bg-blue-600 text-gray-400 group-hover:text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                            Kelola
                            <svg class="w-3 h-3 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 bg-gray-50 text-gray-200 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                            </div>
                            <p class="text-sm text-gray-400 font-bold uppercase tracking-widest">Belum ada produk</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>