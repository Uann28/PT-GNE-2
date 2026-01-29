<x-app-layout title="Semua Produk">
    <div class="mb-10">
        <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Daftar Produk</h2>
        <div class="flex items-center gap-2 mt-1">
            <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Katalog Inventaris Lintas Sektor</p>
            <span class="ml-2 px-2 py-0.5 bg-gray-100 text-gray-500 text-[9px] font-black rounded-full border border-gray-200 uppercase">
                {{ $products->count() }} Total Produk
            </span>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-50">
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Detail Produk</th>
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Sektor Terkait</th>
                    <th class="px-8 py-5 text-right text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Opsi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($products as $product)
                <tr class="group hover:bg-blue-50/30 transition-all duration-300">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-50 text-gray-400 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 font-black text-sm border border-gray-100 group-hover:border-transparent group-hover:-rotate-3 shadow-sm">
                                {{ substr($product->name, 0, 1) }}
                            </div>
                            <div>
                                <span class="block font-bold text-gray-800 tracking-tight group-hover:text-blue-600 transition-colors uppercase text-sm">
                                    {{ $product->name }}
                                </span>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Ref: PNE-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-blue-50 text-blue-700 rounded-xl text-[10px] font-black uppercase tracking-widest border border-blue-100 group-hover:bg-white transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            {{ $product->sector->name }}
                        </span>
                    </td>

                    <td class="px-8 py-6 text-right">
                        <a href="{{ route('admin.products.show', $product) }}"
                           class="inline-flex items-center gap-3 bg-gray-50 group-hover:bg-blue-600 text-gray-400 group-hover:text-white px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.1em] transition-all group-hover:shadow-lg group-hover:shadow-blue-200">
                            Kelola Produk
                            <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-24 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-20 h-20 bg-gray-50 text-gray-200 rounded-3xl flex items-center justify-center mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                            </div>
                            <h4 class="text-gray-800 font-black text-lg tracking-tighter uppercase">Katalog Kosong</h4>
                            <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest mt-1">Belum ada produk yang terdaftar di sistem.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>