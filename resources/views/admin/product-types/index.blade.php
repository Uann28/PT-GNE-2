<x-app-layout :title="'Jenis Produk '.$product->name">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-5">
                <a href="{{ route('admin.products.show', $product) }}" 
                   class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-emerald-600 hover:border-emerald-100 transition-all shadow-sm active:scale-90">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Varian Jenis</h2>
                    <div class="flex items-center gap-2 mt-1">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Produk:</p>
                        <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 text-[9px] font-black rounded-full border border-emerald-100 uppercase tracking-widest">
                            {{ $product->name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden mb-8">
            <div class="p-8">
                <span class="block text-[10px] font-black text-emerald-600 uppercase tracking-[0.2em] mb-4">Tambah Varian Baru</span>
                <form method="POST" action="{{ route('admin.products.types.store', $product) }}" class="flex flex-col md:flex-row gap-4">
                    @csrf
                    <div class="flex-grow">
                        <input type="text" name="name" required
                               placeholder="Misal: Dadu, Heksagon, atau Bata..."
                               class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-emerald-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300">
                    </div>
                    <button class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-emerald-100 transition-all active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                        Simpan
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] ml-6">Daftar Jenis Saat Ini ({{ $product->types->count() }})</h3>
            
            @forelse($product->types as $type)
                <div class="group bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm flex justify-between items-center hover:shadow-md transition-all duration-300">
                    <div class="flex items-center gap-4 ml-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                        <span class="font-bold text-gray-700 tracking-tight group-hover:text-emerald-600 transition-colors uppercase text-sm">
                            {{ $type->name }}
                        </span>
                    </div>

                    <form method="POST" action="{{ route('admin.products.types.destroy', $type) }}" 
                          onsubmit="return confirm('Hapus varian ini?')">
                        @csrf @method('DELETE')
                        <button class="p-3 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all active:scale-90" title="Hapus Varian">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            @empty
                <div class="py-16 bg-gray-50/50 rounded-[2.5rem] border-2 border-dashed border-gray-100 flex flex-col items-center justify-center text-center">
                    <div class="w-16 h-16 bg-white text-gray-200 rounded-2xl flex items-center justify-center mb-4 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <p class="text-xs text-gray-400 font-black uppercase tracking-widest">Belum ada varian jenis</p>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>