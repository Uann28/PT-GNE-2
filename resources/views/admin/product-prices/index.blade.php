<x-app-layout :title="'Kelola Harga: '.$product->name">
    <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center gap-5">
            <a href="{{ route('admin.products.show', $product) }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Konfigurasi Harga</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Produk:</p>
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-black rounded-full border border-blue-100 uppercase tracking-widest">
                        {{ $product->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden mb-12">
        <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-amber-50/30 to-transparent">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-amber-500 rounded-xl text-white shadow-lg shadow-amber-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <span class="block text-[10px] font-black text-amber-600 uppercase tracking-widest">Input Harga</span>
                    <h3 class="text-lg font-bold text-gray-800 tracking-tight">Pasang Harga dari Standar Pusat</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.products.prices.store', $product) }}" class="p-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                {{-- JENIS PRODUK --}}
                <div class="md:col-span-4 group">
                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-blue-600 transition-colors">Varian Jenis (Opsional)</label>
                    <select name="product_type_id" class="w-full px-5 py-4 bg-gray-50 border-2 border-transparent focus:border-blue-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all appearance-none cursor-pointer">
                        <option value="">-- Semua Jenis --</option>
                        @foreach($product->types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-5 group">
                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-blue-600 transition-colors">Mutu, Tebal & Harga Standar</label>
                    <select name="price_standard_id" required class="w-full px-5 py-4 bg-gray-50 border-2 border-transparent focus:border-blue-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all appearance-none cursor-pointer">
                        <option value="">Pilih Master Harga...</option>
                        @foreach($standards as $std)
                            <option value="{{ $std->id }}">
                                {{ $std->mutu }} {{ $std->thickness ? '('.$std->thickness.')' : '' }} — Rp {{ number_format($std->price) }}/{{ $std->unit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-3">
                    <button class="w-full py-4 bg-blue-600 text-white font-black text-[10px] uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-100 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                        Pasang Harga
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <h3 class="text-sm font-black text-gray-800 uppercase tracking-widest">Matriks Harga Aktif</h3>
            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[9px] font-black rounded-lg border border-emerald-100 uppercase tracking-tighter italic">Live in Catalog</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Varian</th>
                        <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Spesifikasi</th>
                        <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Harga Satuan</th>
                        <th class="px-8 py-5 text-right text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($product->prices as $price)
                    <tr class="group hover:bg-blue-50/30 transition-all duration-300">
                        <td class="px-8 py-6">
                            <span class="font-bold text-gray-700 uppercase tracking-tight italic">
                                {{ $price->type?->name ?? 'Default' }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-black text-gray-800">{{ $price->standard->mutu }}</span>
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter italic">Ketebalan: {{ $price->standard->thickness ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-baseline gap-1">
                                <span class="text-[10px] font-black text-blue-600 italic">Rp</span>
                                <span class="text-lg font-black text-blue-600 tracking-tighter">{{ number_format($price->standard->price) }}</span>
                                <span class="text-[10px] font-bold text-gray-400 uppercase">/ {{ $price->standard->unit }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <form method="POST" action="{{ route('admin.products.prices.destroy', $price) }}" onsubmit="return confirm('Hapus relasi harga ini?')">
                                @csrf @method('DELETE')
                                <button class="p-3 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all active:scale-90" title="Hapus Harga">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-50 text-gray-200 rounded-2xl flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Harga belum dikonfigurasi</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <p class="mt-8 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">
        Semua perubahan harga akan langsung tercermin di katalog publik.
    </p>
</x-app-layout>