<x-app-layout title="Tambah Produk">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 flex items-center gap-5">
            <a href="{{ route('admin.sectors.show', $sector) }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-emerald-500 hover:border-emerald-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Tambah Produk</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Sektor: {{ $sector->name }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            {{-- Form Header Branding --}}
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-emerald-50/30 to-transparent">
                <div class="flex items-center gap-4">
                    <div class="p-4 bg-emerald-500 rounded-2xl text-white shadow-xl shadow-emerald-100 ring-4 ring-emerald-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[10px] font-black text-emerald-600 uppercase tracking-widest mb-1">Registrasi Item Baru</span>
                        <h3 class="text-xl font-bold text-gray-800 tracking-tight">Detail Katalog Produk</h3>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.sectors.products.store', $sector) }}" method="POST" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 gap-8">
                    {{-- Nama Produk --}}
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-emerald-500 transition-colors">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-emerald-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300 @error('name') border-red-500 bg-red-50 @enderror" 
                            placeholder="Contoh: Paving Block Hexagon 6cm">
                        @error('name')
                            <p class="mt-2 text-[10px] text-red-500 font-black uppercase tracking-wide">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-emerald-500 transition-colors">Deskripsi Singkat Produk</label>
                        <textarea name="description" rows="5" 
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-emerald-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-medium text-gray-600 leading-relaxed transition-all placeholder-gray-300"
                            placeholder="Tuliskan gambaran umum mengenai produk ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-[10px] text-red-500 font-black uppercase tracking-wide">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-emerald-500 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-emerald-100 hover:bg-emerald-600 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan & Daftarkan Produk
                    </button>
                    
                    <a href="{{ route('admin.sectors.show', $sector) }}" 
                       class="block mt-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">
                        Batalkan Pembuatan
                    </a>
                </div>
            </form>
        </div>

        <div class="mt-8 p-6 bg-blue-50/50 rounded-3xl border border-dashed border-blue-100 flex items-center gap-5">
            <div class="flex-shrink-0 w-12 h-12 bg-white text-blue-600 rounded-2xl flex items-center justify-center shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-[11px] text-gray-500 font-bold leading-relaxed">
                    <strong class="text-blue-600 uppercase tracking-tighter">Langkah Selanjutnya:</strong><br>
                    Setelah menyimpan informasi dasar, Anda akan diarahkan ke panel manajemen produk untuk mengunggah gambar dan mengatur variasi jenis.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>