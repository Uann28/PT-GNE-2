<x-app-layout title="Tambah Standar Harga Baru">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 flex items-center gap-5">
            <a href="{{ route('admin.price-standards.index') }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-indigo-600 hover:border-indigo-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Tambah Master</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-1.5 w-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Registrasi Standar Harga Pusat</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            {{-- Form Header Branding --}}
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-indigo-50/30 to-transparent">
                <div class="flex items-center gap-4">
                    <div class="p-4 bg-indigo-600 rounded-2xl text-white shadow-xl shadow-indigo-100 ring-4 ring-indigo-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[10px] font-black text-indigo-600 uppercase tracking-widest mb-1">Entri Data Baru</span>
                        <h3 class="text-xl font-bold text-gray-800 tracking-tight">Detail Spesifikasi & Harga</h3>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.price-standards.store') }}" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-indigo-600 transition-colors">Klasifikasi Mutu</label>
                        <input type="text" name="mutu" value="{{ old('mutu') }}" required autofocus
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-indigo-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300" 
                            placeholder="Contoh: K250 atau K300">
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-indigo-600 transition-colors">Ketebalan Produk</label>
                        <input type="text" name="thickness" value="{{ old('thickness') }}"
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-indigo-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300"
                            placeholder="Contoh: 6 cm atau 8 cm">
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-indigo-600 transition-colors">Harga Satuan (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-xs font-black text-indigo-600 italic">Rp</span>
                            <input type="number" name="price" value="{{ old('price') }}" required
                                class="w-full pl-14 pr-6 py-4 bg-gray-50 border-2 border-transparent focus:border-indigo-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-black text-gray-800 transition-all"
                                placeholder="000.000">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-indigo-600 transition-colors">Satuan Unit</label>
                        <input type="text" name="unit" value="{{ old('unit') }}" required
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-indigo-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300"
                            placeholder="Contoh: m2 atau pcs">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-indigo-600 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-indigo-100 hover:bg-indigo-700 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan Master Harga
                    </button>
                    
                    <a href="{{ route('admin.price-standards.index') }}" 
                       class="block mt-6 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">
                        Batalkan dan Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>